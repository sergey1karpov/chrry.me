<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Laravel\Scout\Searchable;

class Event extends Model
{
    use HasFactory, Searchable;

    protected $table = 'events';

    public function searchableAs()
    {
        return 'events_index';
    }

    protected $dates = ['created_at'];

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'city' => $this->city,
        ];
    }

    protected $fillable = [
        'title',
        'description',
        'location',
        'time',
        'date',
        'banner',
        'video',
        'media',
        'tickets',
        'user_id',
        'link_id',
        'city',
        'location_font',
        'location_font_size',
        'location_font_color',
        'date_font',
        'date_font_size',
        'date_font_color',
        'transparency',
        'background_color_rgba',
        'background_color_hex',
        'event_animation',
        'event_round',
        'location_text_shadow_color',
        'location_text_shadow_blur',
        'location_text_shadow_bottom',
        'location_text_shadow_right',
        'date_text_shadow_color',
        'date_text_shadow_blur',
        'date_text_shadow_bottom',
        'date_text_shadow_right',
        'block_shadow',
        'bold_city',
        'bold_location',
        'bold_date',
        'bold_time',
    ];

    public static function createEvent(int $id, $request)
    {
        $lastEvent = Event::where('user_id', $id)->orderBy('created_at', 'desc')->first();
        Event::create([
            'title'       => $request->title,
            'city'        => $request->city,
            'description' => $request->description,
            'location'    => $request->location,
            'time'        => $request->time,
            'date'        => $request->date,
            'banner'      => self::addBanner($request->banner),
            'video'       => $request->video,
            'media'       => $request->media,
            'tickets'     => $request->tickets,
            'user_id'     => Auth::user()->id,
            'link_id'     => 1,
            //Design fields
            'location_font'         => isset($request->check_last_event) ? $lastEvent->location_font : $request->location_font,
            'location_font_size'    => isset($request->check_last_event) ? $lastEvent->location_font_size : $request->location_font_size,
            'location_font_color'   => isset($request->check_last_event) ? $lastEvent->location_font_color : $request->location_font_color,
            'date_font'             => isset($request->check_last_event) ? $lastEvent->date_font : $request->date_font,
            'date_font_size'        => isset($request->check_last_event) ? $lastEvent->date_font_size : $request->date_font_size,
            'date_font_color'       => isset($request->check_last_event) ? $lastEvent->date_font_color : $request->date_font_color,
            'transparency'          => isset($request->check_last_event) ? $lastEvent->transparency : $request->transparency,
            'background_color_rgba' => isset($request->check_last_event) ? $lastEvent->background_color_rgba : Link::convertBackgroundColor($request->background_color_hex),
            'background_color_hex'  => isset($request->check_last_event) ? $lastEvent->background_color_hex : $request->background_color_hex,
            'event_animation'       => $request->event_animation,
            'event_round'           => isset($request->check_last_event) ? $lastEvent->event_round : $request->event_round,

            'location_text_shadow_color'         => isset($request->check_last_event) ? $lastEvent->location_text_shadow_color : $request->location_text_shadow_color,
            'location_text_shadow_blur'    => isset($request->check_last_event) ? $lastEvent->location_text_shadow_blur : $request->location_text_shadow_blur,
            'location_text_shadow_bottom'   => isset($request->check_last_event) ? $lastEvent->location_text_shadow_bottom : $request->location_text_shadow_bottom,
            'location_text_shadow_right'             => isset($request->check_last_event) ? $lastEvent->location_text_shadow_right : $request->location_text_shadow_right,
            'date_text_shadow_color'        => isset($request->check_last_event) ? $lastEvent->date_text_shadow_color : $request->date_text_shadow_color,
            'date_text_shadow_blur'       => isset($request->check_last_event) ? $lastEvent->date_text_shadow_blur : $request->date_text_shadow_blur,
            'date_text_shadow_bottom'          => isset($request->check_last_event) ? $lastEvent->date_text_shadow_bottom : $request->date_text_shadow_bottom,
            'date_text_shadow_right' => isset($request->check_last_event) ? $lastEvent->date_text_shadow_right : $request->date_text_shadow_right,
            'block_shadow' => isset($request->check_last_event) ? $lastEvent->block_shadow : $request->block_shadow,

            'bold_city' => isset($request->check_last_event) ? $lastEvent->bold_city : $request->bold_city,
            'bold_location' => isset($request->check_last_event) ? $lastEvent->bold_location : $request->bold_location,
            'bold_date' => isset($request->check_last_event) ? $lastEvent->bold_date : $request->bold_date,
            'bold_time' => isset($request->check_last_event) ? $lastEvent->bold_time : $request->bold_time,
        ]);
    }

    /**
     * @param $banner
     * @return string
     *
     * Загрузка афиши
     */
    public static function addBanner($banner)
    {
        $path = Storage::putFile('public/' . Auth::user()->id . '/event', $banner);
        $strpos = strpos($path, '/');
        $mb_substr = mb_substr($path, $strpos);
        $url = '../storage/app/public'.$mb_substr;
        return $url;
    }

    /**
     * @param User $user
     * @param Event $event
     * @param $request
     * @return void
     *
     * Изменение мероприятия
     */
    public static function editEvent(User $user, Event $event, $request)
    {
        self::where('user_id', $user->id)->where('id', $event->id)->update([
            'title'       => $request->title,
            'description' => $request->description,
            'city'        => $request->city,
            'location'    => $request->location,
            'time'        => $request->time,
            'date'        => isset($request->date) ? $request->date : $event->date,
            'banner'      => isset($request->banner) ? self::addBanner($request->banner) : $event->banner,
            'video'       => $request->video,
            'media'       => $request->media,
            'tickets'     => $request->tickets,
            //Design fields
            'location_font'         => isset($request->location_font) ? $request->location_font : $event->location_font,
            'location_font_size'    => $request->location_font_size,
            'location_font_color'   => $request->location_font_color,
            'date_font'             => isset($request->date_font) ? $request->date_font : $event->date_font,
            'date_font_size'        => $request->date_font_size,
            'date_font_color'       => $request->date_font_color,
            'transparency'          => $request->transparency,
            'background_color_rgba' => Link::convertBackgroundColor($request->background_color_hex),
            'background_color_hex'  => $request->background_color_hex,
            'event_animation'       => $request->event_animation,
            'event_round'           => $request->event_round,
            'location_text_shadow_color'         => $request->location_text_shadow_color,
            'location_text_shadow_blur'    => $request->location_text_shadow_blur,
            'location_text_shadow_bottom'   => $request->location_text_shadow_bottom,
            'location_text_shadow_right'             => $request->location_text_shadow_right,
            'date_text_shadow_color'        => $request->date_text_shadow_color,
            'date_text_shadow_blur'       => $request->date_text_shadow_blur,
            'date_text_shadow_bottom'          => $request->date_text_shadow_bottom,
            'date_text_shadow_right' => $request->date_text_shadow_right,
            'block_shadow' => isset($request->block_shadow) ? $request->block_shadow : $event->shadow,

            'bold_city' => $request->bold_city,
            'bold_location' => $request->bold_location,
            'bold_date' => $request->bold_date,
            'bold_time' => $request->bold_time,
        ]);
    }

    /**
     * @param User $user
     * @param $request
     * @return void
     *
     * Массовое изменение мероприятий
     */
    public static function editAll(User $user, $request)
    {
        self::where('user_id', $user->id)->update([
            'location_font'         => $request->location_font,
            'location_font_size'    => $request->location_font_size,
            'location_font_color'   => $request->location_font_color,
            'date_font'             => $request->date_font,
            'date_font_size'        => $request->date_font_size,
            'date_font_color'       => $request->date_font_color,
            'transparency'          => $request->transparency,
            'background_color_rgba' => Link::convertBackgroundColor($request->background_color_hex),
            'background_color_hex'  => $request->background_color_hex,
            'event_round'           => $request->event_round,
            'location_text_shadow_color'         => $request->location_text_shadow_color,
            'location_text_shadow_blur'    => $request->location_text_shadow_blur,
            'location_text_shadow_bottom'   => $request->location_text_shadow_bottom,
            'location_text_shadow_right'             => $request->location_text_shadow_right,
            'date_text_shadow_color'        => $request->date_text_shadow_color,
            'date_text_shadow_blur'       => $request->date_text_shadow_blur,
            'date_text_shadow_bottom'          => $request->date_text_shadow_bottom,
            'date_text_shadow_right' => $request->date_text_shadow_right,
            'block_shadow' => $request->block_shadow,
            'bold_city' => $request->bold_city,
            'bold_location' => $request->bold_location,
            'bold_date' => $request->bold_date,
            'bold_time' => $request->bold_time,
        ]);
    }

}
