<?php

namespace Tests\Feature;

use App\Models\User;
use App\Services\ColorConvertorService;
use App\Services\StatsService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    /**
     * Login app
     * @return void
     */
    public function test_login_to_application()
    {
        $this->post('/login', [
            'email' => $this->user->email,
            'password' => $this->user->password,
        ]);

        $this->actingAs($this->user);

        $this->followingRedirects()->get(route('editProfileForm', ['id' => $this->user->id]))->assertStatus(200);
    }

    /**
     * if user active
     * @return void
     */
    public function test_skan_nfc_true(): void
    {
        $this->followingRedirects()->get(route('editNewUserForm', ['utag' => $this->user->utag]))->assertStatus(200);
    }

    /**
     * if user no active
     * @return void
     */
    public function test_skan_nfc_false(): void
    {
        $user = User::factory([
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

    /**
     * test user home page and see in name
     * @return void
     */
    public function test_user_home_page()
    {
        $response = $this->get(route('userHomePage', ['user' => $this->user->slug]));

        $response->assertSee($this->user->name);
    }

    /**
     * test user profile stats service
     * @return void
     */
    public function test_user_home_page_test_user_stat_service()
    {
        $statService = new StatsService();

        $statService->createUserStats($this->user, '95.24.203.217');

        $this->assertDatabaseHas('stats', [
            'user_id' => $this->user->id,
            'guest_ip' => '95.24.203.217',
            'country' => 'Russia',
        ]);
    }

    /**
     * test user admin page and see in name
     * @return void
     */
    public function test_edit_profile_form()
    {
        $this->withoutMiddleware();

        $response = $this->get(route('editProfileForm', ['id' => $this->user->id]));

        $response->assertSee($this->user->name);
    }

    /**
     * test edit user profile
     * @return void
     */
    public function test_edit_user_profile()
    {
        $this->actingAs($this->user)->patch(route('editUserProfile', ['id' => $this->user->id]), [
            'name'              => 'Sergey Karpov',
            'description'       => 'Description',
            'background_color'  => '#ffffff',
            'name_color'        => '#000000',
            'description_color' => '#000000',
            'verify_color'      => '#000000',
            'slug'              => 'sergey1Karpov',
            'avatar'            => UploadedFile::fake()->image('avatar.jpg', 500, 500)->size(100),
            'banner'            => UploadedFile::fake()->image('banner.jpg', 500, 500)->size(100),
            'locale'            => 'ru',
            'type'              => 'Links',
            'show_social'       => true,
            'social'            => 'TOP',
            'favicon'           => UploadedFile::fake()->image('avatar.jpg', 500, 500)->size(100),
            'social_links_bar'  => true,
            'show_logo'         => true,
            'links_bar_position' => 'bottom',
            'background_color_rgb' => ColorConvertorService::convertBackgroundColor('#ffffff'),
            'logotype_size' => 30,
            'logotype_shadow_right' => 30,
            'logotype_shadow_bottom' => 30,
            'logotype_shadow_round' => 30,
            'logotype_shadow_color' => '#ffffff',
            'round_links_width' => 50,
            'round_links_shadow_right' => 50,
            'round_links_shadow_bottom' => 50,
            'round_links_shadow_round' => 50,
            'round_links_shadow_color' => 50,
            'logotype' => UploadedFile::fake()->image('logotype.png', 500, 500)->size(100),
        ]);

        $this->assertEquals('Sergey Karpov', User::first()->name);
        $this->assertEquals('sergey1Karpov', User::first()->slug);
    }

    /**
     * test delete user avatar
     * @return void
     */
    public function test_del_user_avatar()
    {
        $this->actingAs($this->user)->patch(route('delUserAvatar', ['id' => $this->user->id, 'type' => 'avatar']), [
            'avatar' => null,
        ]);

        $this->assertEquals(null, User::first()->avatar);
    }

    /**
     * test to change theme user profile
     * @return void
     */
    public function test_change_theme()
    {
        $this->actingAs($this->user)->patch(route('changeTheme', ['id' => $this->user->id]), [
           'dayVsNight' => 1,
        ]);

        $this->assertEquals(1, User::first()->dayVsNight);
    }
}

