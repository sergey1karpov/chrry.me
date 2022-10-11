<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

/**
 * Upload images
 */
class UploadPhotoService
{
    /**
     * Функция принимает:
     * array фотографий или UploadedFile фотографию из реквеста,
     * string $path - Путь по которому нужно сохранить фото
     * int $size - Расширение фотографии(Например 500px x 500px),
     * bool $drop - Нужно ли перед загрузкой новой фотографии удалить старую. Используется при обновлении модели.
     * string $dropImagePath - Название файла который нужно удалить
     *
     * @param array|UploadedFile $ph
     * @param string $path
     * @param int $size
     * @param bool|null $drop
     * @param string|null $dropImagePath
     * @return string
     */
    public function uploader(array|UploadedFile $ph, string $path, int $size, bool $drop = null, string $dropImagePath = null): string
    {
        if(true == $drop && $dropImagePath != null) {
            $this->dropImg($dropImagePath);
        }

        $this->createPath($path);

        if($ph instanceof UploadedFile) {
            $image = Image::make($ph->getRealPath())->fit($size);
            $image->save($path . '/' .$ph->hashName());
            return $image->dirname . '/' . $image->basename;
        }
        if(count($ph) > 0) {
            $ph_array = [];

            foreach ($ph as $p) {
                $image = Image::make($p->getRealPath())->fit($size);
                $image->save($path . '/' .$p->hashName());
                $ph_array[] = $image->dirname . '/' . $image->basename;
            }

            return serialize($ph_array);
        }
    }

    /**
     * @param string $path
     * @return void
     *
     * Create photos paths
     */
    public function createPath(string $path): void
    {
        if (!File::exists($path)) {
            File::makeDirectory($path, 0777,true);
        }
    }

    /**
     * @param string $imagePath
     * @return void
     *
     * Delete product image
     */
    public function dropImg(string $imagePath)
    {
        unlink($imagePath);
    }
}
