<?php

namespace Tests\Feature;

use App\Http\Middleware\UserCheckMiddleware;
use App\Models\Link;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\App;
use Tests\TestCase;
use Illuminate\Http\Request;

class LinkControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_access_root_to_user_menu()
    {
        $user = User::factory(['slug' => 'some_slug', 'is_active' => true])->create();
        $this->actingAs($user);

        $this->get(route('editProfileForm', ['id' => $user->id]))->assertStatus(200);
    }

    public function test_unaccess_root_to_user_menu()
    {
        $user = User::factory(['slug' => 'some_slug', 'is_active' => true])->create();
        $this->actingAs($user);

        $this->get(route('editProfileForm', ['id' => 100]))->assertStatus(404);
    }

    public function test_access_root_to_all_links_page()
    {
        $user = User::factory(['slug' => 'some_slug', 'is_active' => true])->create();
        $this->actingAs($user);

        $this->get(route('allLinks', ['id' => $user->id]))->assertStatus(200);
    }

    public function test_unaccess_root_to_all_links_page()
    {
        $user = User::factory(['slug' => 'some_slug', 'is_active' => true])->create();
        $this->actingAs($user);

        $this->get(route('allLinks', ['id' => 100]))->assertStatus(404);
    }

    public function test_access_root_to_search_links_page()
    {
        $user = User::factory(['slug' => 'some_slug', 'is_active' => true])->create();
        $this->actingAs($user);

        $this->get(route('searchLink', ['id' => $user->id]))->assertStatus(200);
    }

    public function test_unaccess_root_to_search_links_page()
    {
        $user = User::factory(['slug' => 'some_slug', 'is_active' => true])->create();
        $this->actingAs($user);

        $this->get(route('searchLink', ['id' => 100]))->assertStatus(404);
    }

    public function test_add_new_link(): void
    {
        $this->withoutExceptionHandling();
        $user = User::factory(['slug' => 'some_slug', 'is_active' => true])->create();

        $this->actingAs($user);

        $this->post(route('addLink', ['id' => $user->id]), [
            'title' => 'Some random title to link',
            'link' => 'https://vk.com',
            'user_id' => $user->id,
        ]);

        $this->assertDatabaseHas('links', [
            'title' => 'Some random title to link',
            'link' => 'https://vk.com',
            'user_id' => $user->id,
        ]);
    }

    public function test_edit_link(): void
    {
        $this->withoutExceptionHandling();
        $user = User::factory(['slug' => 'some_slug', 'is_active' => true,])->create();

        $link = Link::factory(['user_id' => $user->id])->create();

        $this->actingAs($user)->patch(route('editLink', ['id' => $user->id, 'link' => $link->id]), [
            'title' => 'Some random title to link',
            'link' => 'https://vk.com',
            'user_id' => $user->id,
        ]);

        $this->assertEquals('Some random title to link', Link::first()->title);
        $this->assertEquals('https://vk.com', Link::first()->link);
        $this->assertEquals($user->id, Link::first()->user_id);
    }

    public function test_mass_edit_links()
    {
        $this->withoutExceptionHandling();
        $user = User::factory(['slug' => 'some_slug', 'is_active' => true,])->create();

        Link::factory(10, ['user_id' => $user->id])->create();

        $this->actingAs($user)->patch(route('editAllLink', ['id' => $user->id]), [
            'font' => 'Taxoma',
            'font_size' => 1.1,
            'user_id' => $user->id,
        ]);

        $links = Link::all();
        foreach($links as $link) {
            $this->assertEquals('Taxoma', $link->font);
            $this->assertEquals(1.1, $link->font_size);
            $this->assertEquals($user->id, $link->user_id);
        }
    }

    public function test_delete_link()
    {
        $this->withoutExceptionHandling();
        $user = User::factory(['slug' => 'some_slug', 'is_active' => true,])->create();

        $link = Link::factory(['user_id' => $user->id])->create();

        $response = $this->actingAs($user)->delete(route('delLink', ['id' => $user->id, 'link' => $link->id]));
        $response->assertStatus(302);
        $this->assertEquals(0, Link::count());
    }

    public function test_search_link()
    {
        App::setLocale('RU');
        $user = User::factory(['slug' => 'some_slug', 'is_active' => true,])->create();

        Link::factory(20, ['user_id' => $user->id])->create();
        Link::factory(['user_id' => $user->id, 'title' => 'My link'])->create();
        $this->assertCount(21, Link::all());

        $this->assertDatabaseHas('links',['title' => 'My link'])->get(route('searchLink', ['id' => $user->id]));
    }
}




