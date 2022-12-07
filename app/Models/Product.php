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
     * Create new product
     *
     * @param User $user
     * @param ProductRequest $request
     * @param UploadPhotoService $uploadService
     * @return void
     */
    public function storeProduct(User $user, ProductRequest $request, UploadPhotoService $uploadService): void
    {
        $product = new self();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->full_description = $request->full_description;
        $product->main_photo = $uploadService->savePhoto(
            photo: $request->main_photo,
            path: $this->imgPath($user->id),
            size: 500,
        );
        if($request->additional_photos) {
            $product->additional_photos = $uploadService->savePhotoArray(
                photos: $request->additional_photos,
                path: $this->imgPath($user->id),
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
     * @param User $user
     * @param Product $product
     * @param UpdateProductRequest $request
     * @param UploadPhotoService $uploadService
     * @return void
     */
    public function patchProduct(User $user, Product $product, UpdateProductRequest $request, UploadPhotoService $uploadService): void
    {
        Product::where('id', $product->id)->where('user_id', $user->id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'full_description' => $request->full_description,
            'price' => $request->price ?? $product->price,
            'visible' => isset($request->visible) ? 1 : 0,
            'user_id' => $user->id,
            'main_photo' => isset($request->main_photo) ? $uploadService->savePhoto(
                photo: $request->main_photo,
                path: $this->imgPath($user->id),
                size: 500,
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
     */
    public function countFreeSpace(Product $product): int
    {
        $currentProductPhotos = $product->additional_photos ? count((array)unserialize($product->additional_photos)) : 0;

        return self::TOTAL_PRODUCT_PHOTOS - $currentProductPhotos;
    }

    /**
     * @param array $photos
     * @param UploadPhotoService $uploadService
     * @param string $path
     * @return array
     */
    public function additionalPhotosUploader(array $photos, UploadPhotoService $uploadService, string $path): array
    {
        return unserialize($uploadService->savePhotoArray(photos: $photos, path: $path, size: 500));
    }

    /**
     * @param Product $product
     * @param array $photos
     * @param string $path
     * @param UploadPhotoService $uploadService
     * @return void
     */
    public function uploadAdditionalPhotos(Product $product, array $photos, string $path, UploadPhotoService $uploadService): void
    {
        if($product->additional_photos == null) {
            Product::where('id', $product->id)
                ->update(['additional_photos' => serialize($this->additionalPhotosUploader($photos, $uploadService, $path))]);
        } else {;
            $updatePhotoArray = array_merge(
                (array)unserialize($product->additional_photos),
                $this->additionalPhotosUploader($photos, $uploadService, $path)
            );

            Product::where('id', $product->id)
                ->update(['additional_photos' => serialize($updatePhotoArray)]);
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
        $service->deletePhotoFromFolder($photo);

        Product::update(['additional_photos' => serialize($this->deleteAdditionalProductPhotoFromArray($product, $photo))]);
    }

    /**
     * @param Product $product
     * @param string $photo
     * @return array
     */
    public function deleteAdditionalProductPhotoFromArray(Product $product, string $photo): array
    {
        $photoArray = unserialize($product->additional_photos);

        $findImagePosition = array_search($photo, $photoArray);

        unset($photoArray[$findImagePosition]);

        return $photoArray;
    }

    /**
     * Delete product with all photos
     *
     * @param Product $product
     * @param UploadPhotoService $service
     * @return void
     */
    public function dropProduct(Product $product, UploadPhotoService $service): void
    {
        $photoArray = unserialize($product->additional_photos);

        if($product->additional_photos) {
            foreach($photoArray as $ph) {
                $service->deletePhotoFromFolder($ph);
            }
        }

        $service->deletePhotoFromFolder($product->main_photo);

        $product->delete();
    }
}

