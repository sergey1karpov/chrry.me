<?php

namespace Tests\Feature;

use App\Mail\TwoFactorMail;
use App\Models\User;
use App\Models\UserHash;
use App\Models\UserSettings;
use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase, Authenticatable;

    /**
     * @return void
     */
    public function test_see_register_form(): void
    {
        $response = $this->get(route('register'));
        $response->assertSuccessful();
        $response->assertViewIs('auth.register');
    }

    /**
     * @return void
     */
    public function test_success_registration_to_web(): void
    {
        $response = $this->post(route('register'), [
            'name' => 'Sergey Karpov',
            'slug' => 'karpov',
            'email' => 'karpov@mail.ru',
            'password' => 'q1w2e3r4',
            'password_confirmation' => 'q1w2e3r4',
        ]);

        $this->assertDatabaseHas('users', [
            'name' => 'Sergey Karpov',
            'slug' => 'karpov',
            'email' => 'karpov@mail.ru',
        ]);

        $user = User::where('email', 'karpov@mail.ru')->first();

        $response->assertRedirect(route('editProfileForm', ['user' => $user->id]));
    }

    /**
     * Failed registration. If user already register in our site(uniq email)
     * @return void
     */
    public function test_failed_registration_to_web(): void
    {
        User::factory(['email' => 'karpov@mail.ru'])->create();

        $response = $this->post(route('create.register'), [
            'name' => 'Sergey Karpov',
            'slug' => 'karpov',
            'email' => 'karpov@mail.ru',
            'password' => 'q1w2e3r4',
            'password_confirmation' => 'q1w2e3r4'
        ]);

        $response->assertSessionHasErrors();
        $this->assertSame(count(User::all()), 1);
        $this->assertDatabaseHas('users', [
            'email' => 'karpov@mail.ru',
        ]);
    }

    /**
     * @return void
     */
    public function test_see_login_form(): void
    {
        $response = $this->get(route('login'));
        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    /**
     * @return void
     */
    public function test_success_login_to_web_without_two_factor_auth(): void
    {
        $this->post(route('create.register'), [
            'name' => 'Sergey Karpov',
            'slug' => 'karpov',
            'email' => 'karpov@mail.ru',
            'password' => 'q1w2e3r4',
            'password_confirmation' => 'q1w2e3r4'
        ]);

        $user = User::where('email', 'karpov@mail.ru')->first();

        $response = $this->post(route('login.store'), [
            'email' => $user->email,
            'password' => $user->password,
        ]);

        $this->actingAs($user);

        $response->assertRedirect(route('editProfileForm', ['user' => $user->id]));
    }

    /**
     * @return void
     */
    public function test_failed_login_to_web(): void
    {
        User::factory(['email' => 'karpov@mail.ru', 'password' => 'q1w2e3r4'])->create();

        $response = $this->post(route('login.store'), [
            'email' => 'karpov@mail.com',
            'password' => 'q1w2e3r4',
        ]);

        $response->assertSessionHasErrors();
        $response->assertStatus(302);
    }

    /**
     * @return void
     */
    public function test_success_login_to_web_with_two_factor_auth_and_send_mail_with_token(): void
    {
        User::factory(['email' => 'karpov@mail.ru', 'password' => 'q1w2e3r4', 'two_factor_auth' => true])->create();

        $user = User::where('email', 'karpov@mail.ru')->first();

        $response = $this->post(route('login.store'), [
            'email' => $user->email,
            'password' => $user->password,
        ]);

        $hash = rand();
        $mailable = new TwoFactorMail($hash);
        $mailable->assertSeeInHtml($hash);

        $sendMail = Mail::fake();
        $sendMail->to($user->email);
        $sendMail->mailer(TwoFactorMail::class);

        $response->assertRedirectToSignedRoute('twoFactorForm');
    }

    /**
     * @return void
     */
    public function test_success_two_factor_auth(): void
    {
        User::factory(['email' => 'karpov@mail.ru', 'password' => 'q1w2e3r4', 'two_factor_auth' => true])->create();
        $user = User::where('email', 'karpov@mail.ru')->first();
        UserHash::factory(['user_id' => $user->id])->create();
        $hash = UserHash::where('user_id', $user->id)->first();

        $response = $this->post(route('hashCheck'), [
            'hash' => $hash->hash,
        ]);

        $response->assertRedirect(route('editProfileForm', ['user' => $user->id]));
    }

    /**
     * @return void
     */
    public function test_failed_two_factor_auth(): void
    {
        User::factory(['email' => 'karpov@mail.ru', 'password' => 'q1w2e3r4', 'two_factor_auth' => true])->create();
        $user = User::where('email', 'karpov@mail.ru')->first();
        UserHash::factory(['user_id' => $user->id, 'hash' => '123456789'])->create();

        $response = $this->post(route('hashCheck'), [
            'hash' => 'qwe123d12',
        ]);

        $response->assertSessionHas('bad_code', 'Your code not valid');
    }

    /**
     * @return void
     */
    public function test_editProfileForm(): void
    {
        $user = User::factory([
            'email' => 'karpov@mail.ru',
            'name' => 'Sergey Karpov',
            'slug' => 'karpov',
        ])->create();

        UserSettings::factory(['user_id' => $user->id])->create();

        $response = $this->actingAs($user)->get(route('editProfileForm', ['user' => $user->id]));

        $response->assertStatus(200);
    }
}
