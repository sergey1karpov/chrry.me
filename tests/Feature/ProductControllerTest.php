<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use App\Services\UploadPhotoService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware, WithFaker;

    public function test_assert_products_page()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('allProducts', ['id' => $user->id]));
        $response->assertStatus(200);
    }

    /**
     * @return void
     * Тест на добавление нового продукта
     */
    public function test_add_user_new_product()
    {
        $user = User::factory()->create();

        $images = [];
        $images[] = UploadedFile::fake()->image('ph1.jpg', 500, 500)->size(100);
        $images[] = UploadedFile::fake()->image('ph2.jpg', 500, 500)->size(100);
        $images[] = UploadedFile::fake()->image('ph3.jpg', 500, 500)->size(100);
        $images[] = UploadedFile::fake()->image('ph4.jpg', 500, 500)->size(100);
        $images[] = UploadedFile::fake()->image('ph5.jpg', 500, 500)->size(100);

        $this->actingAs($user)->post(route('addProduct', ['id' => $user->id]), [
            '_token' => csrf_token(),
            'title' => 'Product title',
            'description' => 'Product description',
            'main_photo' => UploadedFile::fake()->image('avatar.jpg', 500, 500)->size(100),
            'additional_photos' => $images,
            'price' => 10,
            'count_products' => 10,
            'visible' => true,
            'user_id' => $user->id,
            'type' => 'Market',
        ]);

        $this->assertDatabaseHas('products', [
            'title' => 'Product title',
            'description' => 'Product description',
            'user_id' => $user->id,
        ]);
    }

    /**
     * @return void
     * Тест на заваленную валидацию продукта
     */
    public function test_failed_validation_to_add_product()
    {
        $user = User::factory()->create();

        $response = $this->post(route('addProduct', ['id' => $user->id]), [
            'description' => 'Product description',
            'main_photo' => UploadedFile::fake()->image('avatar.jpg', 500, 500)->size(100),
            'price' => 10,
            'count_products' => 10,
            'visible' => true,
            'user_id' => $user->id,
        ]);

        $response->assertStatus(302);
        $product = Product::get();
        $this->assertEquals(0, count($product));
    }

    /**
     * @return void
     * Тест на видимость добавленного продукта на странице
     */
    public function test_visible_product_fields_on_user_page()
    {
        $user = User::factory()->create();
        $product = Product::factory(['user_id' => $user->id])->create();

        $response = $this->get(route('userHomePage', ['slug' => $user->slug]));

        $response->assertSeeText($product->title);
        $response->assertSeeText($product->description);
        $response->assertSeeText($product->price);
    }

    /**
     * @return void
     * Тест на обновление продукта
     */
    public function test_check_count_additional_photos()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $product = Product::factory()->create();

        $new_img[] = UploadedFile::fake()->image('ph10.jpg', 500, 500)->size(100);
        $new_img[] = UploadedFile::fake()->image('ph20.jpg', 500, 500)->size(100);
        $new_img[] = UploadedFile::fake()->image('ph30.jpg', 500, 500)->size(100);
        $new_img[] = UploadedFile::fake()->image('ph40.jpg', 500, 500)->size(100);
        $new_img[] = UploadedFile::fake()->image('ph50.jpg', 500, 500)->size(100);

        $this->actingAs($user)->patch(route('editProduct', ['id' => $user->id, 'product' => $product->id]), [
            'title' => 'Updated product',
            'description' => 'Updated Product description',
            'price' => 100,
            'main_photo' => UploadedFile::fake()->image('avatar.jpg', 500, 500)->size(100),
            'visible' => true,
            'additional_photos' => $new_img,
        ]);

        $this->assertDatabaseHas('products', [
            'title' => 'Updated product',
            'description' => 'Updated Product description',
            'price' => 100,
        ]);
    }

    /**
     * @return void
     * Тест на обновление продукта, если у него нет доп фото
     */
    public function test_failed_upload_additional_photos()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $product = Product::factory()->create();

        $new_img[] = UploadedFile::fake()->image('ph10.jpg', 500, 500)->size(100);
        $new_img[] = UploadedFile::fake()->image('ph20.jpg', 500, 500)->size(100);
        $new_img[] = UploadedFile::fake()->image('ph20.jpg', 500, 500)->size(100);
        $new_img[] = UploadedFile::fake()->image('ph20.jpg', 500, 500)->size(100);
        $new_img[] = UploadedFile::fake()->image('ph20.jpg', 500, 500)->size(100);
        $new_img[] = UploadedFile::fake()->image('ph20.jpg', 500, 500)->size(100);

        $response = $this->actingAs($user)->patch(route('editProduct', ['id' => $user->id, 'product' => $product->id]), [
            'title' => 'Updated product',
            'description' => 'Updated Product description',
            'price' => 100,
            'main_photo' => UploadedFile::fake()->image('avatar.jpg', 500, 500)->size(100),
            'visible' => true,
            'additional_photos' => $new_img,
        ]);

        $response->assertSessionHas('count', 5);
    }

    /**
     * @return void
     * Тест на оставшееся место для доп фото у продукта
     */
    public function test_free_space_to_additional_photos()
    {
        $uploadService = new UploadPhotoService();
        $user = User::factory()->create();

        $images = [];
        $images[] = UploadedFile::fake()->image('ph1.jpg', 500, 500)->size(100);
        $images[] = UploadedFile::fake()->image('ph2.jpg', 500, 500)->size(100);

        $this->actingAs($user)->post(route('addProduct', ['id' => $user->id]), [
            '_token' => csrf_token(),
            'title' => 'Product title',
            'description' => 'Product description',
            'main_photo' => UploadedFile::fake()->image('avatar.jpg', 500, 500)->size(100),
            'additional_photos' => $images,
            'price' => 10,
            'count_products' => 10,
            'visible' => true,
            'user_id' => $user->id,
            'type' => 'Market',
        ]);

        $this->assertDatabaseHas('products', [
            'title' => 'Product title',
            'description' => 'Product description',
            'user_id' => $user->id,
        ]);

        $product = Product::first();

        $new_img[] = UploadedFile::fake()->image('ph10.jpg', 500, 500)->size(100);
        $new_img[] = UploadedFile::fake()->image('ph20.jpg', 500, 500)->size(100);
        $new_img[] = UploadedFile::fake()->image('ph20.jpg', 500, 500)->size(100);
        $new_img[] = UploadedFile::fake()->image('ph20.jpg', 500, 500)->size(100);
        $new_img[] = UploadedFile::fake()->image('ph20.jpg', 500, 500)->size(100);
        $new_img[] = UploadedFile::fake()->image('ph20.jpg', 500, 500)->size(100);

        $response = $product->checkCountAdditionalPhotosInProduct($product, $new_img, 'path', $uploadService);

        $this->assertEquals(3, $response);
    }

    public function test_delete_additional_photos()
    {
        $uploadService = new UploadPhotoService();
        $user = User::factory()->create();

        $images = [];
        $images[] = UploadedFile::fake()->image('ph1.jpg', 500, 500)->size(100);
        $images[] = UploadedFile::fake()->image('ph2.jpg', 500, 500)->size(100);
        $images[] = UploadedFile::fake()->image('ph3.jpg', 500, 500)->size(100);
        $images[] = UploadedFile::fake()->image('ph4.jpg', 500, 500)->size(100);
        $images[] = UploadedFile::fake()->image('ph5.jpg', 500, 500)->size(100);

        $this->actingAs($user)->post(route('addProduct', ['id' => $user->id]), [
            '_token' => csrf_token(),
            'title' => 'Product title',
            'description' => 'Product description',
            'main_photo' => UploadedFile::fake()->image('avatar.jpg', 500, 500)->size(100),
            'additional_photos' => $images,
            'price' => 10,
            'count_products' => 10,
            'visible' => true,
            'user_id' => $user->id,
            'type' => 'Market',
        ]);

        $this->assertDatabaseHas('products', [
            'title' => 'Product title',
            'description' => 'Product description',
            'user_id' => $user->id,
        ]);

        $product = Product::first();
        $image_from_product = unserialize($product->additional_photos);

        $new_product = new Product();
        $new_product->dropAddPhoto($user->id, $product, $image_from_product[1], $uploadService);

        $updated_product = Product::first();

        $upd_image_from_product = unserialize($updated_product->additional_photos);

        $this->assertEquals(4, count($upd_image_from_product));
    }
}


