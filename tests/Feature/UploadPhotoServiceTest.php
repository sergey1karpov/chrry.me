<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\UserSettings;
use App\Services\UploadPhotoService;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Image;
use Tests\TestCase;

class UploadPhotoServiceTest extends TestCase
{
    use DatabaseTransactions;

    private UploadPhotoService $uploadPhotoService;

    private User $user;

    private Image $image;

    public function setUp(): void
    {
        parent::setUp();

        $this->uploadPhotoService = new UploadPhotoService();

        $this->user = User::factory()->create();

        $this->image = new Image();
    }

    public function test_saveUserLogotype_without_delete_previous_logotype()
    {
        $logotype = UploadedFile::fake()->image('logotype.png');

        $path = new User();

        $imgPath = $this->uploadPhotoService->saveUserLogotype($logotype, 1000, $path->imgPath($this->user->id));

        $this->assertFileExists($imgPath);
    }

    public function test_saveUserLogotype_with_delete_previous_logotype()
    {
        $path = new User();
        $logotype1 = UploadedFile::fake()->image('logotype.png');
        $imgPath1 = $this->uploadPhotoService->saveUserLogotype($logotype1, 1000, $path->imgPath($this->user->id));

        $logotype2 = UploadedFile::fake()->image('logotype2.png');
        $imgPath2 = $this->uploadPhotoService->saveUserLogotype($logotype2, 1000, $path->imgPath($this->user->id), $imgPath1);

        $this->assertFileDoesNotExist($imgPath1);
        $this->assertFileExists($imgPath2);
    }

    public function test_savePhotoArray_ok()
    {
        $img[] = UploadedFile::fake()->image('img1.png');
        $img[] = UploadedFile::fake()->image('img2.jpg');
        $img[] = UploadedFile::fake()->image('img3.jpeg');
        $img[] = UploadedFile::fake()->image('img4.jpg');
        $img[] = UploadedFile::fake()->image('img5.png');

        $path = new User();

        $imgPath = $this->uploadPhotoService->savePhotoArray($img, $path->imgPath($this->user->id), 500);

        $this->assertSame(count(unserialize($imgPath)), 5);

        foreach (unserialize($imgPath) as $path) {
            $this->assertFileExists($path);
        }
    }

    public function test_savePhoto_ok()
    {
        $image = UploadedFile::fake()->image('img1.png');

        $path = new User();

        $imgPath = $this->uploadPhotoService->savePhoto($image, $path->imgPath($this->user->id), 500);

        $this->assertFileExists($imgPath);
    }

    public function test_savePhoto_with_delete()
    {
        $image = UploadedFile::fake()->image('img.png');

        $path = new User();

        $imgPath = $this->uploadPhotoService->savePhoto($image, $path->imgPath($this->user->id), 500);

        $newImage = UploadedFile::fake()->image('new.png');

        $newImgPath = $this->uploadPhotoService->savePhoto($newImage, $path->imgPath($this->user->id), 500, $imgPath);

        $this->assertFileDoesNotExist($imgPath);
        $this->assertFileExists($newImgPath);
    }

    public function test_savePhoto_ok_gif()
    {
        $this->actingAs($this->user);

        UserSettings::create(['user_id' => $this->user->id,]);

        $image = UploadedFile::fake()->image('img.gif');

        if($image->clientExtension() == 'gif') {
            $imgPath = $this->uploadPhotoService->saveGif($image, 'avatar');

            $this->assertFileExists(Storage::path(substr($imgPath, 15)));
        }
    }

    public function test_savePhoto_ok_gif_with_delete()
    {
        $this->actingAs($this->user);

        UserSettings::create(['user_id' => $this->user->id,]);

        $image = UploadedFile::fake()->image('img.gif');

        $path = null;

        if($image->clientExtension() == 'gif') {
            $imgPath = $this->uploadPhotoService->saveGif($image, 'avatar');

            $path = Storage::path(substr($imgPath, 15));

            $this->assertFileExists($path);
        }

        $newGif = UploadedFile::fake()->image('new.gif');

        if($newGif->clientExtension() == 'gif') {
            $newImgPath = $this->uploadPhotoService->saveGif($newGif, 'avatar', $path);

            $newPath = Storage::path(substr($newImgPath, 15));

            $this->assertFileDoesNotExist($path);
            $this->assertFileExists($newPath);
        }
    }
}
