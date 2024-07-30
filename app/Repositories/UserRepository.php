<?php

namespace App\Repositories;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\LogotypeRequest;
use App\Http\Requests\UpdateRegisterUserRequest;
use App\Http\Requests\UploadPhotoRequest;
use App\Http\Requests\UserSettingsRequest;
use App\Http\Requests\YaMetrikaRequest;
use App\Models\EventSetting;
use App\Models\ProductCategory;
use App\Models\ShopSettings;
use App\Models\User;
use App\Models\UserSettings;
use App\Services\UploadPhotoService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

final class UserRepository
{
    public function __construct(private UploadPhotoService $uploadService) {}

    /**
     * @param User $user
     * @param UpdateRegisterUserRequest $request
     * @return void
     */
    public function editUserProfile(User $user, UpdateRegisterUserRequest $request): void
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
            $this->createDefaultMarketSettings($user);
        }
    }

    /**
     * If user switch profile Event page first time, we create a default Event page settings
     *
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
     * If user switch profile to MarketPlace first time, we create a default MarketPlace settings
     *
     * @param User $user
     * @return void
     */
    public function createDefaultMarketSettings(User $user): void
    {
        $settings = ShopSettings::where('user_id', $user->id)->first();

        if(!$settings) {
            DB::transaction(function () use ($user) {
                ShopSettings::create([
                    'user_id' => $user->id,
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

                /**
                 * Create base product category
                 */
                ProductCategory::create([
                    'name' => 'Все товары',
                    'slug' => 'all',
                    'user_id' => $user->id,
                ]);
            });
        }
    }

    /**
     * @param User $user
     * @param string $email
     * @return void
     */
    public function setUserEmail(User $user, string $email): void
    {
        User::where('id', $user->id)->update(['email' => $email]);
    }

    /**
     * @param User $user
     * @return void
     */
    public function changeUserProfileThemeColor(User $user): void
    {
        if($user->dayVsNight == 0) {
            User::where('id', $user->id)->update(['dayVsNight' => 1]);
        } else {
            User::where('id', $user->id)->update(['dayVsNight' => 0]);
        }
    }

    /**
     * User logo update and configuration
     *
     * @param User $user
     * @param LogotypeRequest $request
     * @return void
     */
    public function updateProfileLogotype(User $user, LogotypeRequest $request): void
    {
        UserSettings::updateOrCreate(
            ['user_id' => $user->id],
            [
                'user_id'  => $user->id,
                'logotype' => isset($request->logotype) ?
                    $this->uploadService->saveUserLogotype(
                        photo: $request->logotype,
                        size: 500,
                        path: $user->imgPath($user->id),
                        dropImagePath: $user->settings->logotype,
                    ) :
                    $user->settings->logotype,
                'logotype_size'          => $request->logotype_size,
                'logotype_shadow_right'  => $request->logotype_shadow_right,
                'logotype_shadow_bottom' => $request->logotype_shadow_bottom,
                'logotype_shadow_round'  => $request->logotype_shadow_round,
                'logotype_shadow_color'  => $request->logotype_shadow_color,
                'avatar_vs_logotype'     => 'logotype'
            ]
        );
    }

    /**
     * @param User $user
     * @param string $choice
     * @return void
     */
    public function selectAvatarOrLogotype(User $user, string $choice): void
    {
        UserSettings::updateOrCreate(
            ['user_id' => $user->id],
            [
                'avatar_vs_logotype' => $choice,
            ]
        );
    }

    /**
     * @param User $user
     * @param UserSettingsRequest $request
     * @return void
     */
    public function updateUserDesignSettings(User $user, UserSettingsRequest $request): void
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
                'follow_btn_top_shadow_right' => $request->follow_btn_top_shadow_right,
                'follow_btn_top_shadow_blur' => $request->follow_btn_top_shadow_blur,
                'follow_border' => $request->follow_border,
                'follow_border_color' => $request->follow_border_color,
                'follow_border_animation' => $request->follow_border_animation,
                'follow_border_animation_speed' => $request->follow_border_animation_speed,
            ]
        );
    }

    /**
     * @param User $user
     * @param UploadPhotoRequest $request
     * @return void
     */
    public function uploadAnyUserImage(User $user, UploadPhotoRequest $request): void
    {
        $imgType = $request->image_type;

        UserSettings::updateOrCreate(
            ['user_id' => $user->id],
            [
                'user_id' => $user->id,
                $imgType => isset($request->$imgType) ?
                    $this->uploadService->savePhoto(
                        photo: $request->$imgType,
                        path: $user->imgPath($user->id),
                        size: $request->image_size,
                        dropImagePath: $user->settings->$imgType,
                        imageType: UploadPhotoService::IMAGE_FOR_PROFILE,
                    ) :
                    $user->settings->$imgType,
                'avatar_vs_logotype' => $request->image_type ? 'avatar' : $user->settings->avatar_vs_logotype
            ]
        );
    }

    /**
     * @param User $user
     * @param ChangePasswordRequest $request
     * @return void
     */
    public function updateUserPassword(User $user, ChangePasswordRequest $request): void
    {
        User::where('id', $user->id)->update([
            'password' => Hash::make($request->password)
        ]);
    }

    /**
     * @param User $user
     * @param Request $request
     * @return void
     */
    public function onOrOffTwoFactorAuth(User $user, Request $request): void
    {
        User::where('id', $user->id)->update(['two_factor_auth' => $request->two_factor_auth]);
    }

    /**
     * @param User $user
     * @param YaMetrikaRequest $request
     * @return void
     */
    public function updateYandexMetrika(User $user, YaMetrikaRequest $request): void
    {
        User::updateOrCreate(
            ['id' => $user->id],
            ['yandex_metrika' => $request->yandex_metrika]
        );
    }

    /**
     * @param User $user
     * @param string $imageType
     * @return void
     */
    public function deletePhotoFromDB(User $user, string $imageType): void
    {
        UserSettings::where('user_id', $user->id)->update([
            $imageType => null,
        ]);
    }
}
