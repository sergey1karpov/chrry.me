<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Event;
use App\Models\Link;
use App\Models\User;
use App\Http\Requests\EventRequest;
use Illuminate\Support\Facades\File;

class EventController extends Controller
{
    /**
     * @param int $id
     * @param EventRequest $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * Добавляет новое мероприятие
     */
    public function addEvent(int $id, EventRequest $request)
    {
        Event::createEvent($id, $request);
        return redirect()->back();
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     *
     * Страница со всеми мероприятиями
     */
    public function allEvents(int $id)
    {
        $user = User::where('id', $id)->firstOrFail();
        $fonts  = public_path('fonts');
        $allFontsInFolder = File::files($fonts);
        $events = Event::where('user_id', $id)->orderBy('date')->get();
        return view('user.events', compact('user', 'events', 'allFontsInFolder'));

    }

    /**
     * @param int $id
     * @param int $event
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * Изменение мероприятия
     */
    public function editEvent(int $id, int $event, Request $request)
    {
        $user = User::where('id', $id)->firstOrFail();
        $event = Event::where('user_id', $id)->where('id', $event)->firstOrFail();
        if($request->banner) {
            unlink(ltrim($event->banner, "/"."../"));
        }
        Event::editEvent($user, $event, $request);
        return redirect()->back();
    }

    /**
     * @param int $id
     * @param int $link
     * @return \Illuminate\Http\RedirectResponse
     *
     * Ручное удаление мероприятия
     */
    public function deleteEvent(int $id, int $event)
    {
        $deleteEvent = Event::where('user_id', $id)->where('id', $event)->firstOrFail();
        unlink(ltrim($deleteEvent->banner, "/"."../"));
        Event::where('user_id', $id)->where('id', $event)->delete();
        return redirect()->back();
    }

    /**
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * Изменение всех мероприятий
     */
    public function editAllEvent(int $id, Request $request)
    {
        $user = User::where('id', $id)->firstOrFail();
        Event::editAll($user, $request);
        return redirect()->back();
    }

    /**
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|never
     *
     * Laravel Scout поиск мероприятий
     */
    public function searchEvent(int $id, Request $request)
    {
        $user = User::where('id', $id)->firstOrFail();
        $events = Event::search($request->search)->where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        $fonts  = public_path('fonts');
        $allFontsInFolder = File::files($fonts);
        return view('user.event-search', compact('user', 'events', 'allFontsInFolder'));
    }
}
