<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateEventRequest;
use App\Services\UploadPhotoService;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use App\Http\Requests\EventRequest;
use Illuminate\Support\Facades\File;

class EventController extends Controller
{
    public $uploadService;

    public function __construct(UploadPhotoService $uploadService)
    {
        $this->uploadService = $uploadService;
    }

    public function createEventForm(int $userId)
    {
        $user = User::findOrFail($userId);

        $icons  = public_path('images/social');
        $allIconsInsideFolder = File::files($icons);
        $fonts  = public_path('fonts');
        $allFontsInFolder = File::files($fonts);

        return view('event.add-event', compact('user', 'allIconsInsideFolder', 'allFontsInFolder'));
    }

    /**
     * Добавление мероприятия
     *
     * @param int $id
     * @param Event $event
     * @param EventRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addEvent(int $id, Event $event, EventRequest $request)
    {
        $event->createEvent($id, $request, $this->uploadService);

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
     * Изменить мероприятие
     *
     * @param int $id
     * @param Event $event
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editEvent(int $id, Event $event, UpdateEventRequest $request)
    {
        $event->editEvent($id, $event, $request, $this->uploadService);

        return redirect()->back();
    }

    /**
     * @param int $id
     * @param int $link
     * @return \Illuminate\Http\RedirectResponse
     *
     * Ручное удаление мероприятия
     */
    public function deleteEvent(int $id, Event $event)
    {
        $event->dropEvent($event, $this->uploadService);

        return redirect()->back();
    }

    /**
     * Массовое изменение мероприятий
     *
     * @param int $id
     * @param Event $event
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editAllEvent(int $id, Event $event, Request $request)
    {
        $event->editAll($id, $request);

        return redirect()->back();
    }

    /**
     * Laravel Scout поиск мероприятий
     *
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|never
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
