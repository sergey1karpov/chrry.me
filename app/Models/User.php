<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\File;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Link;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;

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

    /**
     * @param string $utag
     * @param $request
     * @return void
     *
     * После первого скана метки, будет регистрация. Этот метот её обрабатывает
     */
    public static function confirmNewUser(string $utag, $request)
    {
        self::where('utag', $utag)->update([
            'name'      => $request->name,
            'slug'      => $request->slug,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'is_active' => 1,
        ]);
    }

    /**
     * @param User $user
     * @param $request
     * @return void
     *
     * Изменение профиля пользователя
     */
    protected static function editUserProfile(User $user, $request)
    {
        self::where('id', $user->id)->update([
            'name'              => $request->name,
            'description'       => $request->description,
            'background_color'  => isset($request->background_color) ? $request->background_color : $user->background_color,
            'name_color'        => isset($request->name_color) ? $request->name_color : $user->name_color,
            'description_color' => isset($request->description_color) ? $request->description_color : $user->description_color,
            'verify_color'      => isset($request->verify_color) ? $request->verify_color : $user->verify_color,
            'slug'              => isset($request->slug) ? $request->slug : $user->slug,
            'avatar'            => isset($request->avatar) ? self::addPhotos($request->avatar, 'photo') : $user->avatar,
            'banner'            => isset($request->banner) ? self::addPhotos($request->banner, 'photo') : $user->banner,
            'locale'            => $request->locale,
            'type'              => $request->type,
            'show_social'       => isset($request->show_social) ? $request->show_social : Auth::user()->show_social,
            'social'            => isset($request->social) ? $request->social : Auth::user()->social,
            'favicon'           => isset($request->favicon) ? self::addPhotos($request->favicon, 'favicon') : $user->favicon,
            'social_links_bar'  => $request->social_links_bar,
            'show_logo'         => $request->show_logo,
            'links_bar_position' => $request->links_bar_position,
        ]);
    }

    /**
     * @param $img
     * @param string $type
     * @return string
     *
     * Метод добавления аватара и баннера для профиля
     */
    public static function addPhotos($img, string $type) : string
    {
        if($type == 'favicon') {
            $basePath = '../storage/app/public/' . Auth::user()->id . '/';
            if (!File::exists($basePath)) {
                File::makeDirectory($basePath, 0777,true);
            }

            $image = Image::make($img->getRealPath())->fit(32);
            $image->save($basePath . $img->hashName());
            return '/'.$image->dirname . '/' . $image->basename;
        }
        $path = Storage::putFile('public/' . Auth::user()->id, $img);
        $strpos = strpos($path, '/');
        $mb_substr = mb_substr($path, $strpos);
        $url = '../storage/app/public'.$mb_substr;
        return $url;
    }
}






