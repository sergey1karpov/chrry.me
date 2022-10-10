<?php

namespace App\Models;

use App\Http\Requests\ProductRequest;
use App\Services\UploadPhotoService;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Product extends Model
{
    use HasFactory;

    const TOTAL_PRODUCT_PHOTOS = 5;

    protected $fillable = [
        'title',
        'description',
        'main_photo',
        'price',
        'visible',
        'user_id',
        'type',
        'full_description',
        'additional_photos',
    ];

    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     * Relation with User::class
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function imgPath(int $id): string
    {
        return '../storage/app/public/' . $id . '/products/';
    }

    /**
     * @param int $userId
     * @param ProductRequest $request
     * @param UploadPhotoService $uploadService
     * @return void
     *
     * Store product in db
     */
    public function storeProduct(int $userId, ProductRequest $request, UploadPhotoService $uploadService): void
    {
        $user = User::find($userId);

        $product = new self();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->full_description = $request->full_description;
        $product->main_photo = $uploadService->uploader($request->main_photo, $this->imgPath($userId), 500);
        if($request->additional_photos) {
            $product->additional_photos = $uploadService->uploader($request->additional_photos, $this->imgPath($userId), 500);
        }
        $product->price = $request->price;
        $product->count_products = $request->count_products;
        $product->visible = isset($request->visible) ? 1 : 0;
        $product->type = 'Market';

        $user->products()->save($product);
    }

    /**
     * @param int $userId
     * @param Product $product
     * @param ProductRequest $request
     * @param UploadPhotoService $uploadService
     * @return \Illuminate\Http\RedirectResponse|void
     *
     * Update product
     */
    public function patchProduct(int $userId, Product $product, Request $request, UploadPhotoService $uploadService)
    {
        $imagePath = substr(strrchr($product->main_photo, "/"), 1);

        if($request->additional_photos) {
            $fn = $this->checkCountAdditionalPhotosInProduct($product, $request->additional_photos, $this->imgPath($userId), $uploadService);
            if($fn !== null) {
                return redirect()->back()->with('count', 'Максимальное кол-во дополнительных фотографий 5 шт. Вы можете загрузить ' . $fn . ' фотографии для текущего товара');
            }
        }

        if($request->main_photo) {
            $product->main_photo = $uploadService->uploader($request->main_photo, $this->imgPath($userId), 500, true, $imagePath);
        }

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->visible = isset($request->visible) ? 1 : 0;
        $product->type = 'Market';

        $product->user_id = $userId;
        $product->save();
    }

    /**
     * @param Product $product
     * @return int
     *
     * Count free space
     */
    public function countFreeSpace(Product $product): int
    {
        $currentProductPhotos = $product->additional_photos ? count((array)unserialize($product->additional_photos)) : 0;
        $freePlace = self::TOTAL_PRODUCT_PHOTOS - $currentProductPhotos;
        return $freePlace;
    }

    /**
     * @param Product $product
     * @param array $photos
     * @param string $path
     * @param UploadPhotoService $uploadService
     * @return int|void
     *
     * Check count images in current product
     */
    public function checkCountAdditionalPhotosInProduct(Product $product, array $photos, string $path, UploadPhotoService $uploadService)
    {
        $freePlace = $this->countFreeSpace($product);

        if(count($photos) > $freePlace) {
            return $freePlace;
        } else {
            $currentProductPhotosArr = (array)unserialize($product->additional_photos);
            $uploadProductPhotos = [];

            foreach ($photos as $ph) {
                $uploadProductPhotos[] = $uploadService->uploader($ph, $path, 500);
            }

            $arr = array_merge($currentProductPhotosArr, $uploadProductPhotos);
            $product->additional_photos = serialize($arr);
        }
    }

    /**
     * @param $userId
     * @param Product $product
     * @param string $photo
     * @param UploadPhotoService $service
     * @return void
     *
     * Delete additional photo in product
     */
    public function dropAdditionalPhoto($userId, Product $product, string $photo, UploadPhotoService $service)
    {
        $photoArray = unserialize($product->additional_photos);
        $findImagePosition = array_search($photo, $photoArray);
        unset($photoArray[$findImagePosition]);

        $imagePath = substr(strrchr($photo, "/"), 1);
        $service->dropImg($this->imgPath($userId), $imagePath);

        $product->additional_photos = serialize($photoArray);
        $product->save();
    }

    public function dropProduct(int $userId, Product $product, UploadPhotoService $service)
    {
        $photoArray = unserialize($product->additional_photos);
        $photoNames = [];

        foreach($photoArray as $ph) {
            $photoNames[] = substr(strrchr($ph, "/"), 1);
        }

        foreach ($photoNames as $imagePath) {
            $service->dropImg($this->imgPath($userId), $imagePath);
        }

        $main_photo = substr(strrchr($product->main_photo, "/"), 1);
        $service->dropImg($this->imgPath($userId), $main_photo);

        $product->delete();
    }
}

