<?php

namespace App\Models;

use App\Http\Requests\RegNewUserRequest;
use App\Http\Requests\UpdateRegisteruserRequest;
use App\Services\ColorConvertorService;
use App\Services\UploadPhotoService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

/**
 * [Description User]
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'slug',
        'description',
        'name_color',
        'description_color',
        'verify_color',
        'banner',
        'avatar',
        'is_active',
        'locale',
        'type',
        'show_social',
        'social',
        'favicon',
        'dayVsNight',
        'vk_id',
        'yandex_id',
        'social_links_bar',
        'show_logo',
        'links_bar_position',
        'background_color_rgb'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return [type]
     *
     * HasMany to Links
     */
    public function links() {
        return $this->hasMany(Link::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function userSettings()
    {
        return $this->hasOne(UserSettings::class);
    }

    public function marketSettings()
    {
        return $this->hasOne(ShopSettings::class);
    }

    public function imgPath(int $id): string
    {
        return '../storage/app/public/' . $id;
    }

    /**
     * Редактирование профиля пользователя
     *
     * @param int $userId
     * @param UpdateRegisteruserRequest $request
     * @param UploadPhotoService $uploadService
     * @return void
     */
    public function editUserProfile(int $userId, UpdateRegisteruserRequest $request, UploadPhotoService $uploadService)
    {
        $user = User::find($userId);

        User::where('id', $user->id)->update([
            'name'              => $request->name,
            'description'       => $request->description,
            'background_color'  => isset($request->background_color) ? $request->background_color : $user->background_color,
            'name_color'        => isset($request->name_color) ? $request->name_color : $user->name_color,
            'description_color' => isset($request->description_color) ? $request->description_color : $user->description_color,
            'verify_color'      => isset($request->verify_color) ? $request->verify_color : $user->verify_color,
            'slug'              => isset($request->slug) ? $request->slug : $user->slug,
            'avatar'            => isset($request->avatar) ?
                $uploadService->uploader(
                    ph: $request->avatar,
                    path: $this->imgPath($userId),
                    size: 500,
                    drop: true,
                    dropImagePath: $user->avatar
                ) :
                $user->avatar,
            'banner'            => isset($request->banner) ?
                $uploadService->uploader(
                    ph: $request->banner,
                    path: $this->imgPath($userId),
                    size: 2000,
                    drop: true,
                    dropImagePath: $user->banner
                ) :
                $user->banner,
            'locale'            => $request->locale,
            'type'              => $request->type,
            'show_social'       => isset($request->show_social) ? $request->show_social : $user->show_social,
            'social'            => isset($request->social) ? $request->social : $user->social,
            'favicon'           => isset($request->favicon) ?
                $uploadService->uploader(
                    ph: $request->favicon,
                    path: $this->imgPath($userId),
                    size: 40,
                    drop: true,
                    dropImagePath: $user->favicon
                ) :
                $user->favicon,
            'social_links_bar'  => $request->social_links_bar,
            'show_logo'         => $request->show_logo,
            'links_bar_position' => $request->links_bar_position,
            'background_color_rgb' => ColorConvertorService::convertBackgroundColor($request->background_color),
        ]);

        $this->updateUserSettings($userId, $request);

        if(isset($request->logotype)) {
            $this->uploadLogotype($user, $request->logotype, $uploadService);
        }

        if($request->type == 'Market') {
            $this->createDefaultMarketSettings($userId);
        }
    }

    public function updateUserSettings(int $userId, UpdateRegisteruserRequest $request)
    {
//        UserSettings::updateOrCreate(
//            ['user_id' => $userId],
//            [
//                'logotype_size' => $request->logotype_size,
//                'logotype_shadow_right' => $request->logotype_shadow_right,
//                'logotype_shadow_bottom' => $request->logotype_shadow_bottom,
//                'logotype_shadow_round' => $request->logotype_shadow_round,
//                'logotype_shadow_color' => $request->logotype_shadow_color,
//                'avatar_vs_logotype' => $request->avatar_vs_logotype,
//            ]
//        );


        $isLogotype = UserSettings::where('user_id', $userId)->first();

        if(!$isLogotype) {
            UserSettings::where('user_id', $userId)->create([
                'logotype_size' => $request->logotype_size,
                'logotype_shadow_right' => $request->logotype_shadow_right,
                'logotype_shadow_bottom' => $request->logotype_shadow_bottom,
                'logotype_shadow_round' => $request->logotype_shadow_round,
                'logotype_shadow_color' => $request->logotype_shadow_color,
                'avatar_vs_logotype' => $request->avatar_vs_logotype,
            ]);
        } else {
            UserSettings::where('user_id', $userId)->update([
                'logotype_size' => $request->logotype_size,
                'logotype_shadow_right' => $request->logotype_shadow_right,
                'logotype_shadow_bottom' => $request->logotype_shadow_bottom,
                'logotype_shadow_round' => $request->logotype_shadow_round,
                'logotype_shadow_color' => $request->logotype_shadow_color,
                'avatar_vs_logotype' => $request->avatar_vs_logotype,
            ]);
        }
    }

    public function uploadLogotype(User $user, UploadedFile $logotype, UploadPhotoService $uploadService)
    {
        $isLogotype = UserSettings::where('user_id', $user->id)->first();

        if(!$isLogotype) {
            UserSettings::where('user_id', $user->id)->create([
                'user_id' => $user->id,
                'logotype' => $uploadService->uploader(
                    ph: $logotype,
                    path: $this->imgPath($user->id),
                    size: 500,
                    aspectRatio: true
                ),
            ]);
        } else {
            UserSettings::where('user_id', $user->id)->update([
                'logotype' => $uploadService->uploader(
                    ph: $logotype,
                    path: $this->imgPath($user->id),
                    size: 500,
                    drop: true,
                    dropImagePath: $isLogotype->logotype,
                    aspectRatio: true
                ),
            ]);
        }
    }

    public function createDefaultMarketSettings(int $userId)
    {
        $settings = ShopSettings::where('user_id', $userId)->first();

        if(!$settings) {
            ShopSettings::create([
                'user_id' => $userId,
                'cards_style' => 'one',
                'cards_shadow' => true,
                'color_title' => '#C7C9C6',
                'color_price' => '#15100A',
                'title_shadow' => false,
                'price_shadow' => false,
                'title_font_size' => 1,
                'price_font_size' => 1,
                'card_round' => 10,
                'avatar_vs_logotype' => 'avatar',
            ]);
        }
    }

    /**
     * Удаление Аватарки, Баннера и Фавикона юзера
     *
     * @param int $userId
     * @param Request $request
     * @param UploadPhotoService $uploadService
     * @return void
     */
    public function deleteUserImages(int $userId, Request $request, UploadPhotoService $uploadService)
    {
        $user = User::where('id', $userId)->firstOrFail();

        if($request->type == 'logotype') {
            $uploadService->dropImg($user->userSettings->logotype);
            UserSettings::where('user_id', $userId)->update(['logotype' => null]);
        }

        if($request->type == 'avatar') {
            User::where('id', $userId)->update(['avatar' => null]);
            $uploadService->dropImg($user->avatar);
        }

        if($request->type == 'banner') {
            User::where('id', $userId)->update(['banner' => null]);
            $uploadService->dropImg($user->banner);
        }

        if($request->type == 'favicon') {
            User::where('id', $userId)->update(['favicon' => null]);
            $uploadService->dropImg($user->favicon);
        }
    }

    /**
     * Темная\светлая тема личного кабинета
     *
     * @param int $userId
     * @return void
     */
    public function changeUserTheme(int $userId)
    {
        $user = User::where('id', $userId)->firstOrFail();

        if($user->dayVsNight == 0) {
            User::where('id', $userId)->update(['dayVsNight' => 1]);
        } else {
            User::where('id', $userId)->update(['dayVsNight' => 0]);
        }
    }

    /**
     * Сканирование NFC чипа
     *
     * Подготовка:
     * 1. Сперва регистрируем юзера через админку и вшиваем его в NFC чип
     *
     * Логика:
     * 1. В качестве праметра в url приходит унникальный сгенерированный вшитый $utag - рандомная строка
     * 2. Проверяем юзера в базе где $utag == 'utag' и где юзер еще не активен
     * 3. Если такую запись не находим, то берем из url второй сегмент('slug') и редиректим его на стр со slug
     * 4. Если запись не находим, то редиректим на страницу фальш реги, по сути это обновление созданного юзера из
     *    пункта подготовка.
     *
     * @param string $utag
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function newUserNFC(string $utag, Request $request)
    {
        $user = User::where('utag', $utag)->where('is_active', 0)->firstOrFail();

        if(!$user) {
            $active_user = User::where('utag', $request->segment(2))->where('is_active', 1)->first();
            return redirect()->route('userHomePage', ['slug' => $active_user->slug]);
        }

        return view('auth.edit-user', compact('user'));
    }

    /**
     * Фальш рега(Обновление юзера) после сканирования NFC чипа в первый раз
     *
     * @param string $utag
     * @param RegNewUserRequest $request
     * @return void
     */
    public function confirmNewUser(string $utag, RegNewUserRequest $request)
    {
        User::where('utag', $utag)->update([
            'name'      => $request->name,
            'slug'      => $request->slug,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'is_active' => 1,
        ]);
    }
}






