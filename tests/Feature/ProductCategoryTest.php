<?php

namespace Tests\Feature;

use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductCategoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_category_view()
    {
        $user = User::factory()->create();

        $this->actingAs($user)->get(route('allCategories', ['id' => $user->id]))->assertStatus(200);
    }

    public function test_update_category()
    {
        $this->withoutExceptionHandling();

        $user = User::factory(['slug' => 'some_slug', 'is_active' => true,])->create();

        $productCategory = ProductCategory::factory(['user_id' => $user->id])->create();

        $this->actingAs($user)->patch(route('editCategory', ['id' => $user->id, 'category' => $productCategory->id]), [
            'name' => 'Updated name',
            'slug' => 'Updated_slug',
        ]);

        $this->assertEquals('Updated name', ProductCategory::first()->name);
    }
}

