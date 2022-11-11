<?php

namespace Tests\Feature;

use App\Http\Middleware\UserCheckMiddleware;
use App\Models\Link;
use App\Models\User;
use App\Services\ColorConvertorService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\App;
use Tests\TestCase;
use Illuminate\Http\Request;

class LinkControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * GET Маршруты для Links
     * @var array|string[]
     */
    public array $routes = [
        'allLinks',
        'createLinkForm',
    ];

    /**
     * Проверка доступа юзера к GET маршрутам - ждем 200
     * @return void
     */
    public function test_access_root_to_links_pages()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        foreach ($this->routes as $route) {
            $this->get(route($route, ['id' => $user->id]))->assertStatus(200);
        }
    }

    /**
     * Проверка доступа юзера к GET маршрутам - ждем 404
     * @return void
     */
    public function test_unaccess_root_to_links_pages()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        foreach ($this->routes as $route) {
            $this->get(route($route, ['id' => 100]))->assertStatus(404);
        }
    }

    /**
     * Тест на добавление новой ссылки
     * @return void
     */
    public function test_add_new_link(): void
    {
        $this->withoutExceptionHandling();

        $user = User::factory(['slug' => 'some_slug', 'is_active' => true])->create();

        $this->actingAs($user)->post(route('addLink', ['id' => $user->id]), [
            'title' => 'Some random title to link',
            'link' => 'https://vk.com',
            'user_id' => $user->id,
            'background_color' => ColorConvertorService::convertBackgroundColor('#ffffff'),
        ]);

        $this->assertDatabaseHas('links', [
            'title' => 'Some random title to link',
            'link' => 'https://vk.com',
            'user_id' => $user->id,
        ]);
    }

    /**
     * Тест на изменение ссылки
     * @return void
     */
    public function test_edit_link(): void
    {
        $this->withoutExceptionHandling();

        $user = User::factory(['slug' => 'some_slug', 'is_active' => true,])->create();

        $link = Link::factory(['user_id' => $user->id])->create();

        $this->actingAs($user)->patch(route('editLink', ['id' => $user->id, 'link' => $link->id]), [
            'title' => 'Some random title to link',
            'link' => 'https://vk.com',
            'user_id' => $user->id,
            'background_color' => ColorConvertorService::convertBackgroundColor('#ffffff'),
        ]);

        $this->assertEquals('Some random title to link', Link::first()->title);
        $this->assertEquals('https://vk.com', Link::first()->link);
        $this->assertEquals($user->id, Link::first()->user_id);
    }

    /**
     * Тест на массовое изменение ссылок
     * @return void
     */
    public function test_mass_edit_links()
    {
        $this->withoutExceptionHandling();

        $user = User::factory(['slug' => 'some_slug', 'is_active' => true,])->create();

        Link::factory(10, ['user_id' => $user->id])->create();

        $this->actingAs($user)->patch(route('editAllLink', ['id' => $user->id]), [
            'font' => 'Taxoma',
            'font_size' => 1.1,
            'user_id' => $user->id,
            'background_color' => ColorConvertorService::convertBackgroundColor('#ffffff'),
        ]);

        $links = Link::all();

        foreach($links as $link) {
            $this->assertEquals('Taxoma', $link->font);
            $this->assertEquals(1.1, $link->font_size);
            $this->assertEquals($user->id, $link->user_id);
        }
    }

    /**
     * Тест на удаление ссылки
     * @return void
     */
    public function test_delete_link()
    {
        $this->withoutExceptionHandling();

        $user = User::factory(['slug' => 'some_slug', 'is_active' => true,])->create();

        $link = Link::factory(['user_id' => $user->id])->create();

        $response = $this->actingAs($user)->delete(route('delLink', ['id' => $user->id, 'link' => $link->id]));

        $response->assertStatus(302);

        $this->assertEquals(0, Link::count());
    }

    /**
     * Тест на поиск ссылки
     * @return void
     */
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




