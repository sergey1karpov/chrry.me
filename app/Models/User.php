<?php

namespace App\Models;

use App\Http\Requests\AvatarRequest;
use App\Http\Requests\BackgroundRequest;
use App\Http\Requests\FaviconRequest;
use App\Http\Requests\ImgRequest;
use App\Http\Requests\LogotypeRequest;
use App\Http\Requests\UpdateRegisteruserRequest;
use App\Services\ColorConvertorService;
use App\Services\UploadPhotoService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Http\Request;

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
        'background_color_rgb',
        'logotype',
        'logotype_size',
        'logotype_shadow_right',
        'logotype_shadow_bottom',
        'logotype_shadow_round',
        'logotype_shadow_color',
        'avatar_vs_logotype',
        'round_links_width',
        'round_links_shadow_right',
        'round_links_shadow_bottom',
        'round_links_shadow_round',
        'round_links_shadow_color',
        'navigation_color',
        'two_factor_auth',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function eventSettings()
    {
        return $this->hasOne(EventSetting::class);
    }

    public function links(): HasMany
    {
        return $this->hasMany(Link::class);
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class)->orderBy('date');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function marketSettings(): HasOne
    {
        return $this->hasOne(ShopSettings::class);
    }

    public function productCategories(): HasMany
    {
        return $this->hasMany(ProductCategory::class)->orderBy('position', 'ASC');
    }

    public function hash(): HasOne
    {
        return $this->hasOne(UserHash::class);
    }

    public function userLinksInBar(User $user): Collection
    {
        return $this->links()->where('user_id', $this->id)->orderBy('position')->get();
    }

    public function imgPath(int $id): string
    {
        return '../storage/app/public/' . $id;
    }

    public function userLinks(bool $pinned): Collection
    {
        return $this->links()->where('user_id', $this->id)->where('pinned', $pinned)->orderBy('position')->get();
    }

    public function userProducts(): Collection
    {
        return Product::where('user_id', $this->id)->where('delete', null)->orderBy('position')->take(20)->get();
    }

    public function userLinksWithoutBar(): Collection
    {
        return $this->links()->where('type', 'LINK')->where('user_id', $this->id)->where('icon', null)->where('pinned', false)->orderBy('position')->get();
    }

    /**
     * Edit user profile
     *
     * @param User $user
     * @param UpdateRegisteruserRequest $request
     * @return void
     */
    public function editUserProfile(User $user, UpdateRegisteruserRequest $request): void
    {
        User::where('id', $user->id)->update([
            'name'              => $request->name,
            'email'             => $request->email,
            'description'       => $request->description,
            'slug'              => $request->slug ?? $user->slug,
            'locale'            => $request->locale,
            'type'              => $request->type,
//            'show_social'       => $request->show_social ?? $user->show_social,
//            'social'            => $request->social ?? $user->social,
            'background_color_rgb' => isset($request->background_color) ? ColorConvertorService::convertBackgroundColor($request->background_color) : $user->background_color_rgb,
        ]);

        if($request->type == 'Events') {
            $this->createDefaultEventSettings($user);
        }

//        if($request->type == 'Market') {
//            $this->createDefaultMarketSettings($user->id);
//        }
    }

    /**
     * Update user avatar
     *
     * @param User $user
     * @param AvatarRequest $request
     * @param UploadPhotoService $uploadService
     * @return void
     */
    public function updateAvatar(User $user, AvatarRequest $request, UploadPhotoService $uploadService)
    {
        User::where('id', $user->id)->update([
            'avatar' => isset($request->avatar) ?
                $uploadService->savePhoto(
                    photo: $request->avatar,
                    path: $this->imgPath($user->id),
                    size: 500,
                    dropImagePath: $user->avatar
                ) :
                $user->avatar,
        ]);
    }

    /**
     * Update user logotype
     *
     * @param User $user
     * @param LogotypeRequest $request
     * @param UploadPhotoService $uploadService
     * @return void
     */
    public function updateLogotype(User $user, LogotypeRequest $request, UploadPhotoService $uploadService)
    {
        User::where('id', $user->id)->update([
            'logotype'           => isset($request->logotype) ?
                $uploadService->saveUserLogotype(
                    photo: $request->logotype,
                    size: 500,
                    path: $this->imgPath($user->id),
                    dropImagePath: $user->logotype,
                ) :
                $user->logotype,
            'logotype_size' => $request->logotype_size,
            'logotype_shadow_right' => $request->logotype_shadow_right,
            'logotype_shadow_bottom' => $request->logotype_shadow_bottom,
            'logotype_shadow_round' => $request->logotype_shadow_round,
            'logotype_shadow_color' => $request->logotype_shadow_color,
        ]);
    }

    /**
     * What will be displayed avatar or logo on the profile card
     *
     * @param User $user
     * @param Request $request
     * @return void
     */
    public function updateAvatarVsLogotype(User $user, Request $request)
    {
        User::where('id', $user->id)->update([
            'avatar_vs_logotype' => $request->avatar_vs_logotype,
        ]);
    }

    /**
     * Update background image
     *
     * @param User $user
     * @param BackgroundRequest $request
     * @param UploadPhotoService $uploadService
     * @return void
     */
    public function updateBackgroundImage(User $user, BackgroundRequest $request, UploadPhotoService $uploadService)
    {
        User::where('id', $user->id)->update([
            'banner' => isset($request->banner) ?
                $uploadService->savePhoto(
                    photo: $request->banner,
                    path: $this->imgPath($user->id),
                    size: 2000,
                    dropImagePath: $user->banner
                ) :
                $user->banner,
        ]);
    }

    /**
     * @param User $user
     * @param FaviconRequest $request
     * @param UploadPhotoService $uploadService
     * @return void
     */
    public function updateFavicon(User $user, FaviconRequest $request, UploadPhotoService $uploadService)
    {
        User::where('id', $user->id)->update([
            'favicon' => isset($request->favicon) ?
                $uploadService->savePhoto(
                    photo: $request->favicon,
                    path: $this->imgPath($user->id),
                    size: 40,
                    dropImagePath: $user->favicon
                ) :
                $user->favicon,
        ]);
    }

    public function updateColors(User $user, Request $request)
    {
        User::where('id', $user->id)->update([
            'background_color'  => $request->background_color,
            'name_color'        => $request->name_color,
            'description_color' => $request->description_color,
            'verify_color'      => $request->verify_color,
            'navigation_color'  => $request->navigation_color,
        ]);
    }

    public function updateSocialBar(User $user, Request $request)
    {
        User::where('id', $user->id)->update([
            'social_links_bar'  => $request->social_links_bar,
            'links_bar_position' => $request->links_bar_position,
            'round_links_width' => $request->round_links_width,
            'round_links_shadow_right' => $request->round_links_shadow_right,
            'round_links_shadow_bottom' => $request->round_links_shadow_bottom,
            'round_links_shadow_round' => $request->round_links_shadow_round,
            'round_links_shadow_color' => $request->round_links_shadow_color,
        ]);
    }

    public function updateChrryLogo(User $user, Request $request)
    {
        User::where('id', $user->id)->update([
            'show_logo' => $request->show_logo,
        ]);
    }

    /**
     * If user change page type to Market, we create a default market settings
     *
     * @param int $userId
     * @return void
     */
    public function createDefaultMarketSettings(int $userId): void
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

    public function createDefaultEventSettings(User $user)
    {
        $settings = EventSetting::where('user_id', $user->id)->first();

        if(!$settings) {
            EventSetting::create([
                'user_id' => $user->id,
                'close_card_type' => 1,
                'open_card_type' => 1,
            ]);
        }
    }

    /**
     * Delete user avatar, favicon, banner and logotype
     *
     * @param User $user
     * @param string $type
     * @param UploadPhotoService $uploadService
     * @return void
     */
    public function deleteUserImages(User $user, string $type, UploadPhotoService $uploadService): void
    {
        User::where('id', $user->id)->update([$type => null]);

        $uploadService->deletePhotoFromFolder($user->$type);
    }

    /**
     * Night or day profile theme
     *
     * @param User $user
     * @return void
     */
    public function changeUserTheme(User $user): void
    {
        if($user->dayVsNight == 0) {
            User::where('id', $user->id)->update(['dayVsNight' => 1]);
        } else {
            User::where('id', $user->id)->update(['dayVsNight' => 0]);
        }
    }

    public function updateTwoFactorAuth(User $user, Request $request)
    {
        User::where('id', $user->id)->update([
            'two_factor_auth' => $request->two_factor_auth,
        ]);
    }
}






