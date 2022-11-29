<?php

namespace App\Models;

use App\Enums\UserProfileImageType;
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

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function links() {
        return $this->hasMany(Link::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class)->orderBy('date');
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

    public function productCategories()
    {
        return $this->hasMany(ProductCategory::class)->orderBy('position', 'ASC');
    }

    public function userLinksInBar(User $user)
    {
        return Link::where('user_id', $user->id)->where('pinned', false)->orderBy('position')->get();
    }

    public function imgPath(int $id): string
    {
        return '../storage/app/public/' . $id;
    }

    public function userLinks(bool $pinned): \Illuminate\Database\Eloquent\Collection
    {
        return $this->links()->where('user_id', $this->id)->where('pinned', $pinned)->orderBy('position')->get();
    }

    public function userProducts()
    {
        return Product::where('user_id', $this->id)->where('delete', null)->orderBy('position')->get();
    }

    public function userLinksWithoutBar(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->links()->where('type', 'LINK')->where('user_id', $this->id)->where('icon', null)->orderBy('position')->get();
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
        UserSettings::updateOrCreate(
            ['user_id' => $userId],
            [
                'user_id' => $userId,
                'logotype_size' => $request->logotype_size ?? 250,
                'logotype_shadow_right' => $request->logotype_shadow_right ?? 0,
                'logotype_shadow_bottom' => $request->logotype_shadow_bottom ?? 0,
                'logotype_shadow_round' => $request->logotype_shadow_round ?? 0,
                'logotype_shadow_color' => $request->logotype_shadow_color ?? '#000000',
                'avatar_vs_logotype' => $request->avatar_vs_logotype,

                'round_links_width' => $request->round_links_width ?? 40,
                'round_links_shadow_right' => $request->round_links_shadow_right ?? 0,
                'round_links_shadow_bottom' => $request->round_links_shadow_bottom ?? 0,
                'round_links_shadow_round' => $request->round_links_shadow_round ?? 0,
                'round_links_shadow_color' => $request->round_links_shadow_color ?? '#000000',
            ]
        );
    }

    public function uploadLogotype(User $user, UploadedFile $logotype, UploadPhotoService $uploadService)
    {
        $isLogotype = UserSettings::where('user_id', $user->id)->first();

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
                'canvas_color' => '#FFFAFA',
                'canvas_font_color' => '#000000',
                'show_search' => true,
            ]);

            ProductCategory::create([
                'name' => 'Все товары',
                'slug' => 'all',
                'user_id' => $userId,
            ]);
        }
    }

    /**
     * Удаление Аватарки, Баннера и Фавикона юзера
     *
     * @param int $userId
     * @param string $type
     * @param UploadPhotoService $uploadService
     * @return void
     */
    //Оптимизировать
    public function deleteUserImages(int $userId, string $type, UploadPhotoService $uploadService)
    {
        $user = User::where('id', $userId)->firstOrFail();

        if($type == UserProfileImageType::LOGOTYPE->value) {
            UserSettings::where('user_id', $userId)->update(['logotype' => null]);
            $uploadService->dropImg($user->userSettings->logotype);
        }

        if($type == UserProfileImageType::AVATAR->value) {
            User::where('id', $userId)->update(['avatar' => null]);
            $uploadService->dropImg($user->avatar);
        }

        if($type == UserProfileImageType::BANNER->value) {
            User::where('id', $userId)->update(['banner' => null]);
            $uploadService->dropImg($user->banner);
        }

        if($type == UserProfileImageType::FAVICON->value) {
            User::where('id', $userId)->update(['favicon' => null]);
            $uploadService->dropImg($user->favicon);
        }
    }

    /**
     * Night or day profile theme
     *
     * @param int $userId
     * @return void
     */
    //Оптимизировать
    public function changeUserTheme(int $userId)
    {
        $user = User::where('id', $userId)->firstOrFail();

        if($user->dayVsNight == 0) {
            User::where('id', $userId)->update(['dayVsNight' => 1]);
        } else {
            User::where('id', $userId)->update(['dayVsNight' => 0]);
        }
    }
}






