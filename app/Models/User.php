<?php

namespace App\Models;

use App\Http\Requests\RegNewUserRequest;
use App\Http\Requests\UpdateRegisteruserRequest;
use App\Services\UploadPhotoService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
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
                $uploadService->uploader($request->avatar, $this->imgPath($userId), 500, true, $user->avatar) :
                $user->avatar,
            'banner'            => isset($request->banner) ?
                $uploadService->uploader($request->banner, $this->imgPath($userId), 2000, true, $user->banner) :
                $user->banner,
            'locale'            => $request->locale,
            'type'              => $request->type,
            'show_social'       => isset($request->show_social) ? $request->show_social : $user->show_social,
            'social'            => isset($request->social) ? $request->social : $user->social,
            'favicon'           => isset($request->favicon) ?
                $uploadService->uploader($request->favicon, $this->imgPath($userId), 40, true, $user->favicon) :
                $user->favicon,
            'social_links_bar'  => $request->social_links_bar,
            'show_logo'         => $request->show_logo,
            'links_bar_position' => $request->links_bar_position,
        ]);
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






