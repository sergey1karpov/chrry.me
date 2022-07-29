<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Event;
use App\Models\Link;
use App\Models\User;
use App\Http\Requests\EventRequest;

class EventController extends Controller
{
    private function mediaDriver($media)
    {
        $re = "/(?<=playlist)[^\r\n]++/"; 
        preg_match_all($re, $media, $matches);
        $element_id = $matches[0][0];
        $strArr = explode('_', $element_id); //0,1

        return $aaa = '<script type="text/javascript" src="https://vk.com/js/api/openapi.js?168" charset="windows-1251"></script>'.
        "<div id='vk_playlist_" . $element_id . "'></div>" . '<script type="text/javascript">' . "VK.Widgets.Playlist('vk_playlist_" . $element_id . "', " . $strArr[0] . ", " . $strArr[1] . ", 'b9c03e0d8c5f9c59d2');</script>";
    }

    public function addEvent($id, Request $request)
    {
        $lastEvent = Event::where('user_id', $id)->orderBy('created_at', 'desc')->first();

        $event = Event::create([
            'title'       => $request->title,
            'city'        => $request->city,
            'description' => $request->description,
            'location'    => $request->location,
            'time'        => $request->time,
            'date'        => $request->date,
            'banner'      => $this->addBanner($request->banner),
            'video'       => $request->video,
            'media'       => isset($request->media) ? $this->mediaDriver($request->media) : '',
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
        ]);

        return redirect()->back();
    }

    public function addBanner($banner)
    {
        $path = Storage::putFile('public/' . Auth::user()->id . '/event', $banner);
        $strpos = strpos($path, '/');
        $mb_substr = mb_substr($path, $strpos);
        $url = '../storage/app/public'.$mb_substr;
        return $url;
    }

    public function allEvents(int $id)
    {
        $user = User::where('id', $id)->firstOrFail();
        if($user) {
            $events = Event::where('user_id', $user->id)->orderBy('date')->get();
            return view('user.events', compact('user', 'events'));
        } else {
            return abort(404);
        }
    }

    public function editEvent(int $id, int $event, Request $request)
    {
        $user = User::where('id', $id)->firstOrFail();
        if($user) {
            $event = Event::where('user_id', $user->id)->where('id', $event)->firstOrFail();
            $event->title = $request->title;
            $event->description = $request->description;
            $event->city = $request->city;
            $event->location = $request->location;
            $event->time = $request->time;
            $event->date = isset($request->date) ? $request->date : $event->date;
            $event->banner = isset($request->banner) ? $this->addBanner($request->banner) : $event->banner;
            $event->video = $request->video;
            $event->media = $request->media;
            $event->tickets = $request->tickets;

            $event->location_font = $request->location_font;
            $event->location_font_size = $request->location_font_size;
            $event->location_font_color = $request->location_font_color;
            $event->date_font = $request->date_font;
            $event->date_font_size = $request->date_font_size;
            $event->date_font_color = $request->date_font_color;
            $event->transparency = $request->transparency;
            $event->background_color_rgba = Link::convertBackgroundColor($request->background_color_hex);
            $event->background_color_hex = $request->background_color_hex;
            $event->event_animation = $request->event_animation;
            $event->event_round = $request->event_round;

            $event->update();

            return redirect()->back();
        } else {
            return abort(404);
        }
    }

    public function deleteEvent(int $id, int $link)
    {
        $user = User::where('id', $id)->firstOrFail();
        if($user) {
            Event::where('user_id', $user->id)->where('id', $link)->delete();
            return redirect()->back();
        } else {
            return abort(404);
        }
    }

    public function deleteBanner(int $id, int $link)
    {
        $user = User::where('id', $id)->firstOrFail();
        if($user) {
            Event::where('user_id', $user->id)->where('id', $link)->update(['banner' => null]);
            return redirect()->back();
        }
    }

    public function editAllEvent(int $id, Request $request) 
    {
        $user = User::where('id', $id)->firstOrFail();
        if($user) {
            Event::where('user_id', $id)->update([
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
            ]);

            return redirect()->back();
        } else {
            return abort(404);
        }
    }
}
