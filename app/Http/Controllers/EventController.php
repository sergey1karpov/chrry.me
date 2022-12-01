<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateEventRequest;
use App\Services\UploadPhotoService;
use App\Traits\IconsAndFonts;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use App\Http\Requests\EventRequest;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class EventController extends Controller
{
    use IconsAndFonts;

    public function __construct (
        private readonly UploadPhotoService $uploadService
    ) {}

    /**
     * Show form to create new Event
     *
     * @param int $userId
     * @return View
     */
    public function createEventForm(int $userId): View
    {
        $user = User::findOrFail($userId);

        return view('event.add-event', [
            'user' => $user,
            'allFontsInFolder' => $this->getFonts()
        ]);
    }

    /**
     * Add new Event
     *
     * @param int $id
     * @param Event $event
     * @param EventRequest $request
     * @return RedirectResponse
     */
    public function addEvent(int $id, Event $event, EventRequest $request): RedirectResponse
    {
        $event->createEvent($id, $request, $this->uploadService);

        return redirect()->back()->with('success', 'Мероприятие добавлено!');
    }

    /**
     * Page with all events
     *
     * @param int $id
     * @return View
     */
    public function allEvents(int $id): View
    {
        $user = User::where('id', $id)->firstOrFail();

        return view('event.events', [
            'user' => $user,
            'allFontsInFolder' => $this->getFonts(),
        ]);
    }

    /**
     * Update event
     *
     * @param int $id
     * @param Event $event
     * @param UpdateEventRequest $request
     * @return RedirectResponse
     */
    public function editEvent(int $id, Event $event, UpdateEventRequest $request)
    {
        $event->editEvent($id, $event, $request, $this->uploadService);

        return redirect()->back();
    }

    /**
     * Manual delete event
     *
     * @param int $id
     * @param Event $event
     * @return RedirectResponse
     */
    public function deleteEvent(int $id, Event $event): RedirectResponse
    {
        $event->dropEvent($event, $this->uploadService);

        return redirect()->back();
    }

    /**
     * Events mass edit
     *
     * @param int $id
     * @param Event $event
     * @param Request $request
     * @return RedirectResponse
     */
    public function editAllEvent(int $id, Event $event, Request $request): RedirectResponse
    {
        $event->editAll($id, $request);

        return redirect()->back();
    }

    /**
     * Event full text search
     *
     * @param int $id
     * @param Request $request
     * @return View
     */
    public function searchEvent(int $id, Request $request): View
    {
        $user = User::where('id', $id)->firstOrFail();

        $events = Event::search($request->search)->where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        return view('event.search', [
            'user' => $user,
            'events' => $events,
            'allFontsInFolder' => $this->getFonts(),
        ]);
    }
}
