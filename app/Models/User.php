<?php

namespace App\Models;

use App\Http\Requests\AvatarRequest;
use App\Http\Requests\BackgroundRequest;
use App\Http\Requests\FaviconRequest;
use App\Http\Requests\LogotypeRequest;
use App\Http\Requests\UpdateRegisteruserRequest;
use App\Http\Requests\UploadPhotoRequest;
use App\Http\Requests\UserSettingsRequest;
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

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'slug',
        'description',
        'is_active',
        'locale',
        'type',
        'dayVsNight',
        'social_links_bar',
        'show_logo',
        'links_bar_position',
        'avatar_vs_logotype',
        'two_factor_auth',
        'remember_token',
        'yandex_metrika',
        'vk_id'
    ];

    /**
     * @var string[]
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return HasOne
     */
    public function settings(): HasOne
    {
        return $this->hasOne(UserSettings::class);
    }

    /**
     * @return HasOne
     */
    public function eventSettings()
    {
        return $this->hasOne(EventSetting::class);
    }

    /**
     * @return HasOne
     */
    public function seo()
    {
        return $this->hasOne(SEO::class);
    }

    /**
     * @return HasOne
     */
    public function qrCode()
    {
        return $this->hasOne(QRCode::class);
    }

    /**
     * @return HasMany
     */
    public function links(): HasMany
    {
        return $this->hasMany(Link::class);
    }

    /**
     * @return HasMany
     */
    public function events(): HasMany
    {
        return $this->hasMany(Event::class)->orderBy('date');
    }

    /**
     * @return HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /**
     * @return HasMany
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * @return HasOne
     */
    public function marketSettings(): HasOne
    {
        return $this->hasOne(ShopSettings::class);
    }

    /**
     * @return HasMany
     */
    public function productCategories(): HasMany
    {
        return $this->hasMany(ProductCategory::class)->orderBy('position', 'ASC');
    }

    /**
     * @return HasOne
     */
    public function hash(): HasOne
    {
        return $this->hasOne(UserHash::class);
    }

    /**
     * @return HasMany
     */
    public function followers(): HasMany
    {
        return $this->hasMany(EventsFollow::class);
    }

    /**
     * @param User $user
     * @return Collection
     */
    public function userLinksInBar(User $user): Collection
    {
        return $this->links()->where('user_id', $this->id)->orderBy('position')->get();
    }

    /**
     * @param int $id
     * @return string
     */
    public function imgPath(int $id): string
    {
        return '../storage/app/public/' . $id;
    }

    /**
     * @param bool $pinned
     * @return Collection
     */
    public function userLinks(bool $pinned): Collection
    {
        return $this->links()->where('user_id', $this->id)->where('pinned', $pinned)->orderBy('position')->get();
    }

    /**
     * @return Collection
     */
    public function userProducts(): Collection
    {
        return Product::where('user_id', $this->id)->where('delete', null)->orderBy('position')->take(20)->get();
    }

    /**
     * @return Collection
     */
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
        ]);

        if($request->type == 'Events') {
            $this->createDefaultEventSettings($user);
        }

        if($request->type == 'Market') {
            $this->createDefaultMarketSettings($user->id);
        }
    }

    /**
     * Update user logotype
     *
     * @param User $user
     * @param LogotypeRequest $request
     * @param UploadPhotoService $uploadService
     * @return void
     */
    public function updateLogotype(User $user, LogotypeRequest $request, UploadPhotoService $uploadService): void
    {
        UserSettings::updateOrCreate(
            ['user_id' => $user->id],
            [
                'user_id'  => $user->id,
                'logotype' => isset($request->logotype) ?
                    $uploadService->saveUserLogotype(
                        photo: $request->logotype,
                        size: 500,
                        path: $this->imgPath($user->id),
                        dropImagePath: $user->settings->logotype,
                    ) :
                    $user->settings->logotype,
                'logotype_size'          => $request->logotype_size,
                'logotype_shadow_right'  => $request->logotype_shadow_right,
                'logotype_shadow_bottom' => $request->logotype_shadow_bottom,
                'logotype_shadow_round'  => $request->logotype_shadow_round,
                'logotype_shadow_color'  => $request->logotype_shadow_color
            ]
        );
    }

    /**
     * What will be displayed avatar or logo on the profile card
     *
     * @param User $user
     * @param Request $request
     * @return void
     */
    public function updateAvatarVsLogotype(User $user, Request $request): void
    {
        UserSettings::updateOrCreate(
            ['user_id' => $user->id],
            [
                'avatar_vs_logotype' => $request->avatar_vs_logotype,
            ]
        );
    }

    /**
     * @param User $user
     * @param UserSettingsRequest $request
     * @param UploadPhotoService $uploadService
     * @return void
     */
    public function updateDesignSettings(User $user, UserSettingsRequest $request, UploadPhotoService $uploadService): void
    {
        UserSettings::updateOrCreate(
            ['user_id' => $user->id],
            [
                'user_id' => $user->id,
                'background_color'  => $request->background_color,
                'name_color'        => $request->name_color,
                'description_color' => $request->description_color,
                'verify_color'      => $request->verify_color,
                'navigation_color'  => $request->navigation_color,
                'social_links_bar'  => $request->social_links_bar,
                'links_bar_position' => $request->links_bar_position,
                'round_links_width' => $request->round_links_width,
                'round_links_shadow_right' => $request->round_links_shadow_right,
                'round_links_shadow_bottom' => $request->round_links_shadow_bottom,
                'round_links_shadow_round' => $request->round_links_shadow_round,
                'round_links_shadow_color' => $request->round_links_shadow_color,
                'show_logo' => $request->show_logo,
                'name_font' => $request->name_font,
                'name_font_size' => $request->name_font_size,
                'name_font_shadow_right' => $request->name_font_shadow_right,
                'name_font_shadow_bottom' => $request->name_font_shadow_bottom,
                'name_font_shadow_blur' => $request->name_font_shadow_blur,
                'name_font_shadow_color' => $request->name_font_shadow_color,
                'description_font' => $request->description_font,
                'description_font_size' => $request->description_font_size,
                'description_font_shadow_right' => $request->description_font_shadow_right,
                'description_font_shadow_bottom' => $request->description_font_shadow_bottom,
                'description_font_shadow_blur' => $request->description_font_shadow_blur,
                'description_font_shadow_color' => $request->description_font_shadow_color,
                'verify_icon_type' => $request->verify_icon_type,
                'event_followers' => $request->event_followers,
                'name_bold' => $request->name_bold,
                'description_bold' => $request->description_bold,
                'follow_block_border_radius' => $request->follow_block_border_radius,
                'follow_block_bg_color' => $request->follow_block_bg_color,
                'follow_block_text' => $request->follow_block_text,
                'follow_block_text_size' => $request->follow_block_text_size,
                'follow_block_font' => $request->follow_block_font,
                'follow_block_font_color' => $request->follow_block_font_color,
                'follow_block_font_shadow_color' => $request->follow_block_font_shadow_color,
                'follow_block_font_shadow_right' => $request->follow_block_font_shadow_right,
                'follow_block_font_shadow_bottom' => $request->follow_block_font_shadow_bottom,
                'follow_block_font_shadow_blur' => $request->follow_block_font_shadow_blur,
                'follow_btn_top_shadow_color' => $request->follow_btn_top_shadow_color,
                'follow_btn_top_shadow_top' => $request->follow_btn_top_shadow_top,
                'follow_btn_top_shadow_blur' => $request->follow_btn_top_shadow_blur,
                'congratulation_text' => $request->congratulation_text,
                'congratulation_on_off' => $request->congratulation_on_off,
                'congratulation_gif' => isset($request->congratulation_gif) ?
                    $uploadService->savePhoto(
                        photo: $request->congratulation_gif,
                        path: $this->imgPath($user->id),
                        size: 200,
                        dropImagePath: $user->settings->congratulation_gif,
                        imageType: UploadPhotoService::IMAGE_FOR_PROFILE,
                    ) :
                    $user->settings->congratulation_gif,
            ]
        );
    }

    public function uploadImage(User $user, UploadPhotoRequest $request, UploadPhotoService $uploadService)
    {
        $imgType = $request->image_type;

        UserSettings::updateOrCreate(
            ['user_id' => $user->id],
            [
                'user_id' => $user->id,
                $imgType => isset($request->$imgType) ?
                    $uploadService->savePhoto(
                        photo: $request->$imgType,
                        path: $this->imgPath($user->id),
                        size: $request->image_size,
                        dropImagePath: $user->settings->$imgType,
                        imageType: UploadPhotoService::IMAGE_FOR_PROFILE,
                    ) :
                    $user->settings->$imgType,
            ]
        );
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

    /**
     * @param User $user
     * @return void
     */
    public function createDefaultEventSettings(User $user): void
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
        $uploadService->deletePhotoFromFolder($user->settings->$type);

        UserSettings::where('user_id', $user->id)->update([$type => null]);
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

    /**
     * @param User $user
     * @param Request $request
     * @return void
     */
    public function updateTwoFactorAuth(User $user, Request $request): void
    {
        User::where('id', $user->id)->update([
            'two_factor_auth' => $request->two_factor_auth,
        ]);
    }
}






