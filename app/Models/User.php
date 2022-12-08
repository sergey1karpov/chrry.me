<?php

namespace App\Models;

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
        'navigation_color'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

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

    public function userLinksInBar(User $user): Collection
    {
        return Link::where('user_id', $user->id)->where('pinned', false)->orderBy('position')->get();
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
     * @param UploadPhotoService $uploadService
     * @return void
     */
    public function editUserProfile(User $user, UpdateRegisteruserRequest $request, UploadPhotoService $uploadService): void
    {
        $user->update([
            'name'              => $request->name,
            'description'       => $request->description,
            'background_color'  => $request->background_color,
            'name_color'        => $request->name_color,
            'description_color' => $request->description_color,
            'verify_color'      => $request->verify_color,
            'slug'              => $request->slug ?? $user->slug,
            'avatar'            => isset($request->avatar) ?
                $uploadService->savePhoto(
                    photo: $request->avatar,
                    path: $this->imgPath($user->id),
                    size: 500,
                    dropImagePath: $user->avatar
                ) :
                $user->avatar,
            'banner'            => isset($request->banner) ?
                $uploadService->savePhoto(
                    photo: $request->banner,
                    path: $this->imgPath($user->id),
                    size: 2000,
                    dropImagePath: $user->banner
                ) :
                $user->banner,
            'locale'            => $request->locale,
            'type'              => $request->type,
            'show_social'       => $request->show_social ?? $user->show_social,
            'social'            => $request->social ?? $user->social,
            'favicon'           => isset($request->favicon) ?
                $uploadService->savePhoto(
                    photo: $request->favicon,
                    path: $this->imgPath($user->id),
                    size: 40,
                    dropImagePath: $user->favicon
                ) :
                $user->favicon,
            'social_links_bar'  => $request->social_links_bar,
            'show_logo'         => $request->show_logo,
            'links_bar_position' => $request->links_bar_position,
            'background_color_rgb' => ColorConvertorService::convertBackgroundColor($request->background_color),

            'logotype_size' => $request->logotype_size,
            'logotype_shadow_right' => $request->logotype_shadow_right,
            'logotype_shadow_bottom' => $request->logotype_shadow_bottom,
            'logotype_shadow_round' => $request->logotype_shadow_round,
            'logotype_shadow_color' => $request->logotype_shadow_color,
            'avatar_vs_logotype' => $request->avatar_vs_logotype,
            'round_links_width' => $request->round_links_width,
            'round_links_shadow_right' => $request->round_links_shadow_right,
            'round_links_shadow_bottom' => $request->round_links_shadow_bottom,
            'round_links_shadow_round' => $request->round_links_shadow_round,
            'round_links_shadow_color' => $request->round_links_shadow_color,
            'logotype'           => isset($request->logotype) ?
                $uploadService->saveUserLogotype(
                    photo: $request->logotype,
                    size: 500,
                    path: $this->imgPath($user->id),
                    dropImagePath: $user->logotype,
                ) :
                $user->logotype,
            'navigation_color' => $request->navigation_color,
        ]);

        if($request->type == 'Market') {
            $this->createDefaultMarketSettings($user->id);
        }
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
}






