<?php

namespace App\Models;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Services\UploadPhotoService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory, Searchable;

    /**
     * Максимальное колличество дополнительных фото у продукта
     */
    const TOTAL_PRODUCT_PHOTOS = 5;

    protected $fillable = [
        'title',
        'description',
        'main_photo',
        'price',
        'visible',
        'user_id',
        'full_description',
        'additional_photos',
        'link_to_shop',
        'link_to_shop_text',
        'link_to_order_text',
        'product_categories_id',
        'position',
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_categories_id', 'id');
    }

    protected $table = 'products';

    public function searchableAs()
    {
        return 'products_index';
    }

    public function toSearchableArray()
    {
        return [
            'id'    => $this->id,
            'title' => $this->title,
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Путь по которому сохраняются фотографии для продукта
     *
     * @param int $id
     * @return string
     */
    public function imgPath(int $id): string
    {
        return '../storage/app/public/' . $id . '/products/';
    }

    /**
     * Добавить продукт в базу данных
     *
     * @param int $userId
     * @param ProductRequest $request
     * @param UploadPhotoService $uploadService
     * @return void
     */
    public function storeProduct(int $userId, ProductRequest $request, UploadPhotoService $uploadService): void
    {
        $user = User::find($userId);

        $product = new self();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->full_description = $request->full_description;
        $product->main_photo = $uploadService->uploader(
            ph: $request->main_photo,
            path: $this->imgPath($userId),
            size: 500
        );
        if($request->additional_photos) {
            $product->additional_photos = $uploadService->uploader(
                ph: $request->additional_photos,
                path: $this->imgPath($userId),
                size: 500
            );
        }
        $product->price = $request->price;
        $product->visible = isset($request->visible) ? 1 : 0;

        $product->link_to_shop = $request->link_to_shop;
        $product->link_to_shop_text = $request->link_to_shop_text;
        $product->link_to_order_text = $request->link_to_order_text;
        $product->product_categories_id = $request->product_categories_id;

        $user->products()->save($product);
    }

    /**
     * Update product
     *
     * @param int $userId
     * @param Product $product
     * @param UpdateProductRequest $request
     * @param UploadPhotoService $uploadService
     * @return int|void
     */
    public function patchProduct(int $userId, Product $product, UpdateProductRequest $request, UploadPhotoService $uploadService)
    {
        Product::where('id', $product->id)->where('user_id', $userId)->update([
            'title' => $request->title,
            'description' => $request->description,
            'full_description' => $request->full_description,
            'price' => $request->price ?? $product->price,
            'visible' => isset($request->visible) ? 1 : 0,
            'user_id' => $userId,
            'main_photo' => isset($request->main_photo) ? $uploadService->uploader(
                ph: $request->main_photo,
                path: $this->imgPath($userId),
                size: 500,
                drop: true,
                dropImagePath: $product->main_photo) : $product->main_photo,
            'link_to_shop' => $request->link_to_shop,
            'link_to_shop_text' => $request->link_to_shop_text,
            'link_to_order_text' => $request->link_to_order_text,
            'product_categories_id' => $request->product_categories_id,
        ]);
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
                $uploadProductPhotos[] = $uploadService->uploader(
                    ph: $ph,
                    path: $path,
                    size: 500
                );
            }

            if($product->additional_photos == null) {
                $product->additional_photos = serialize($uploadProductPhotos);
            } else {
                $arr = array_merge($currentProductPhotosArr, $uploadProductPhotos);
                Product::where('id', $product->id)->update([
                    'additional_photos' => serialize($arr),
                ]);
            }
        }
    }

    /**
     * Delete additional photo in product
     *
     * @param Product $product
     * @param string $photo
     * @param UploadPhotoService $service
     * @return void
     */
    public function dropAdditionalPhoto(Product $product, string $photo, UploadPhotoService $service): void
    {
        $photoArray = unserialize($product->additional_photos);
        $findImagePosition = array_search($photo, $photoArray);
        unset($photoArray[$findImagePosition]);

        $service->dropImg($photo);

        $product->additional_photos = serialize($photoArray);
        $product->save();
    }

    /**
     * Удаление продукта с фотографиями
     *
     * @param Product $product
     * @param UploadPhotoService $service
     * @return void
     */
    public function dropProduct(Product $product, UploadPhotoService $service)
    {
        $photoArray = unserialize($product->additional_photos);

        if($product->additional_photos) {
            foreach($photoArray as $ph) {
                $service->dropImg($ph);
            }
        }

        $service->dropImg($product->main_photo);

        $product->delete();
    }
}

