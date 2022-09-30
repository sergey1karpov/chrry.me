<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * @return void
     * Вход в приложение
     */
    public function test_login_to_application()
    {
        $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'password',
        ]);

        $user = User::factory()->create([
            'slug' => 'some_slug',
        ]);

        $this->actingAs($user);

        $this->followingRedirects()->get(route('editProfileForm', ['id' => $user->id]))->assertStatus(200);
    }

    /**
     * @return void
     *
     * Проверка скана nfc метки и редирект на страницу юзера
     */
    public function test_skan_nfc_true(): void
    {
        $user = User::factory([
            'slug' => 'some_slug',
        ])->create();

        $this->followingRedirects()->get(route('editNewUserForm', ['utag' => $user->utag]))->assertStatus(200);
    }

    /**
     * @return void
     *
     * Проверка скана nfc метки и редирект на страницу фальш реги
     */
    public function test_skan_nfc_false(): void
    {
        $user = User::factory([
            'slug' => 'user_slug',
            'is_active' => false,
        ])->create();

        $this->patch(route('editNewUser', ['utag' => $user->utag]), [
            'name'      => $user->name,
            'slug'      => $user->slug,
            'email'     => $user->email,
            'password'  => $user->password,
            'is_active' => true,
        ]);

        $this->actingAs($user);

        $thisUser = User::where('id', $user->id)->first();

        $this->assertEquals($user->id, $thisUser->id);
        $this->assertEquals($user->slug, $thisUser->slug);

        $this->followingRedirects()->get(route('editProfileForm', ['id' => $user->id]))->assertStatus(200);
    }
}
