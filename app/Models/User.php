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
use Illuminate\Support\Facades\Auth;
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
     * Return 3 user events to demo page
     *
     * @return Collection
     */
    public function demoUserEvents(): Collection
    {
        return Event::where('user_id', Auth::user()->id)->take(3)->orderByDesc('id')->get();
    }

    /**
     * Return 6 user links to demo page
     *
     * @param bool $pinned
     * @return Collection
     */
    public function demoUserLinks(bool $pinned): Collection
    {
        return $pinned ?
            Link::where('user_id', Auth::user()->id)->where('icon', null)->take(6)->orderByDesc('id')->get() :
            Link::where('user_id', Auth::user()->id)->take(6)->orderByDesc('id')->get();
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
        return $this->links()
            ->where('type', 'LINK')
            ->where('user_id', $this->id)
            ->where('icon', null)
            ->where('pinned', false)
            ->orderBy('position')
            ->get();
    }

    public function congSetting(User $user, UserSettingsRequest $request, UploadPhotoService $uploadService)
    {
        UserSettings::updateOrCreate(
            ['user_id' => $user->id],
            [
                'user_id' => $user->id,
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

    /**
     * Get user page type
     *
     * @return string
     */
    public function getPageType():string {
        return $this->type;
    }
}






