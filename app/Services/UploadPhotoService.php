<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class UploadPhotoService
{
    const IMAGE_FOR_PROFILE = 'profileImg';
    const IMAGE_FOR_LINK = 'link';

    /**
     * Save user logotype
     *
     * @param UploadedFile $photo
     * @param int $size
     * @param string $path
     * @param string|null $dropImagePath
     * @return string
     */
    public function saveUserLogotype(
        UploadedFile $photo,
        int $size,
        string $path,
        string $dropImagePath = null): string
    {
        if($dropImagePath != null) {
            $this->deletePhotoFromFolder($dropImagePath);
        }

        $this->createPathForPhoto($path);

        $image = Image::make($photo);

        $image->resize(null, $size, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        $image->save($path . '/' .$photo->hashName());

        return $image->dirname . '/' . $image->basename;
    }

    /**
     * @param array $photos
     * @param string $path
     * @param int $size
     * @param string|null $dropImagePath
     * @return string
     */
    public function savePhotoArray(
        array $photos,
        string $path,
        int $size,
        string $dropImagePath = null): string
    {

        if($dropImagePath != null) {
            $this->deletePhotoFromFolder($dropImagePath);
        }

        $this->createPathForPhoto($path);

        $photo_array = [];

        foreach ($photos as $photo) {
            $image = Image::make($photo->getRealPath())->fit($size);

            $image->save($path . '/' .$photo->hashName());

            $photo_array[] = $image->dirname . '/' . $image->basename;
        }

        return serialize($photo_array);
    }

    /**
     * @param UploadedFile $photo
     * @param string $path
     * @param int $size
     * @param string|null $dropImagePath
     * @param string|null $imageType
     * @return string
     */
    public function savePhoto(
        UploadedFile $photo,
        string $path,
        int $size,
        string $dropImagePath = null,
        string $imageType = null): string
    {
        if($photo->getClientOriginalExtension() == 'gif') {
            return $this->saveGif($photo, $imageType, $dropImagePath);
        }

        if($dropImagePath != null) {
            $this->deletePhotoFromFolder($dropImagePath);
        }

        $this->createPathForPhoto($path);

        $image = Image::make($photo->getRealPath())->fit($size);

        $image->save($path . '/' .$photo->hashName());

        return $image->dirname . '/' . $image->basename;
    }

    /**
     * Gif uploader
     *
     * @param UploadedFile $photo
     * @param string $imageType
     * @param string|null $dropImagePath
     * @return string
     */
    public function saveGif(
        UploadedFile $photo,
        string $imageType,
        string $dropImagePath = null): string
    {
        if($dropImagePath) {
            $this->deletePhotoFromFolder($dropImagePath);
        }

        if($imageType == self::IMAGE_FOR_LINK) {
            $url = Storage::putFile('public/' . Auth::user()->id .'/links', $photo);
            return '../storage/app/'.$url;
        }

        if($imageType == self::IMAGE_FOR_PROFILE) {
            $url = Storage::putFile('public/' . Auth::user()->id, $photo);
            return '../storage/app/'.$url;
        }

        $url = Storage::put('public/' . Auth::user()->id, $photo);
        return '../storage/app/'.$url;
    }

    /**
     * @param string $path
     * @return void
     */
    public function createPathForPhoto(string $path): void
    {
        if (!File::exists($path)) {
            File::makeDirectory($path, 0777,true);
        }
    }

    /**
     * @param string $imagePath
     * @return void
     */
    public function deletePhotoFromFolder(string $imagePath): void
    {
        unlink($imagePath);
    }
}
