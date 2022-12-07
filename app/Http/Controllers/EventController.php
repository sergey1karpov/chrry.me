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
     * @param User $user
     * @return View
     */
    public function createEventForm(User $user): View
    {
        return view('event.add-event', [
            'user' => $user,
            'allFontsInFolder' => $this->getFonts()
        ]);
    }

    /**
     * Add new Event
     *
     * @param User $user
     * @param Event $event
     * @param EventRequest $request
     * @return RedirectResponse
     */
    public function addEvent(User $user, Event $event, EventRequest $request): RedirectResponse
    {
        $event->createEvent($user, $request, $this->uploadService);

        return redirect()->back()->with('success', 'Мероприятие добавлено!');
    }

    /**
     * Page with all events
     *
     * @param User $user
     * @return View
     */
    public function allEvents(User $user): View
    {
        return view('event.events', [
            'user' => $user,
            'allFontsInFolder' => $this->getFonts(),
        ]);
    }

    /**
     * Update event
     *
     * @param User $user
     * @param Event $event
     * @param UpdateEventRequest $request
     * @return RedirectResponse
     */
    public function editEvent(User $user, Event $event, UpdateEventRequest $request)
    {
        $event->editEvent($user, $event, $request, $this->uploadService);

        return redirect()->back();
    }

    /**
     * Manual delete event
     *
     * @param User $user
     * @param Event $event
     * @return RedirectResponse
     */
    public function deleteEvent(User $user, Event $event): RedirectResponse
    {
        $event->dropEvent($event, $this->uploadService);

        return redirect()->back();
    }

    /**
     * Events mass edit
     *
     * @param User $user
     * @param Event $event
     * @param Request $request
     * @return RedirectResponse
     */
    public function editAllEvent(User $user, Event $event, Request $request): RedirectResponse
    {
        $event->editAll($user, $request);

        return redirect()->back();
    }

    /**
     * Event full text search
     *
     * @param User $user
     * @param Request $request
     * @return View
     */
    public function searchEvent(User $user, Request $request): View
    {
        $events = Event::search($request->search)->where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        return view('event.search', [
            'user' => $user,
            'events' => $events,
            'allFontsInFolder' => $this->getFonts(),
        ]);
    }
}
