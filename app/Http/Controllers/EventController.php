<?php

namespace App\Http\Controllers;

use App\Http\Requests\MassUpdateEventRequest;
use App\Http\Requests\UpdateEventBannerRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Jobs\EventEmailNotification;
use App\Jobs\GetFollowersEmail;
use App\Mail\EventNotification;
use App\Models\EventSetting;
use App\Models\Properties\EventProperties;
use App\Providers\EmailEventSending;
use App\Services\PropertiesService;
use App\Services\UploadPhotoService;
use App\Traits\IconsAndFonts;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use App\Http\Requests\EventRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class EventController extends Controller
{
    use IconsAndFonts;

    public function __construct (
        private  UploadPhotoService $uploadService,
        public   PropertiesService  $propertiesService,
        private  Event              $event,
        private  EventProperties    $properties,
    ) {}

    /**
     * @param User $user
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function settings(User $user): \Illuminate\Contracts\View\View|Factory|Application
    {
        return view('event.settings', compact('user'));
    }

    /**
     * Edit event themes
     *
     * @param User $user
     * @param Request $request
     * @return RedirectResponse
     */
    public function settingsEdit(User $user, Request $request): RedirectResponse
    {
        EventSetting::updateOrCreate(
            ['user_id' => $user->id],
            [
                'close_card_type' => $request->type_close_card,
                'open_card_type' => $request->open_card_type,
            ]
        );

        return redirect()->back()->with('success', 'Profile settings successfully updated!');
    }

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
            'allFontsInFolder' => $this->getFonts(),
            'cities' => \DB::select('SELECT * FROM city'),
            'properties' => $this->properties->properties,
            'event' => $this->properties->event,
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
        $event = $event->createEvent($user, $request, $this->uploadService, $this->propertiesService);

        if($request->send_email) {
            EmailEventSending::dispatch($user, $request->city_id, $event);
        }

        return redirect()->back()->with('success', 'Event added successfully! You can add more...');
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
     * @param User $user
     * @return Application|Factory|\Illuminate\Contracts\View\View|RedirectResponse
     */
    public function editAllEventsForm(User $user): \Illuminate\Contracts\View\View|Factory|RedirectResponse|Application
    {
        if(count($user->events) == 0) {
            return redirect()->route('allEvents', ['user' => $user->id])->with('success', "You doesn't have events");
        }

        return view('event.edit-all', [
            'user' => $user,
            'allIconsInsideFolder' => $this->getIcons(),
            'allFontsInFolder' => $this->getFonts(),
            'properties' => $this->properties->properties,
            'event' => $this->properties->event,
        ]);
    }

    /**
     * @param User $user
     * @param Event $event
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function editEventForm(User $user, Event $event)
    {
        return view('event.edit-event', [
            'user' => $user,
            'event' => $event,
            'allIconsInsideFolder' => $this->getIcons(),
            'allFontsInFolder' => $this->getFonts(),
            'properties' => (object) unserialize($event->properties),
            'cities' => \DB::select('SELECT * FROM city'),
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
        $event->editEvent($user, $event, $request, $this->propertiesService, $this->uploadService);

        return redirect()->back()->with('success', 'Event updated successfully');
    }

    /**
     * @param User $user
     * @param Event $event
     * @param UpdateEventBannerRequest $request
     * @return RedirectResponse
     */
    public function editEventBanner(User $user, Event $event, UpdateEventBannerRequest $request): RedirectResponse
    {
        $event->editEventBanner($user, $event, $request, $this->uploadService);

        return redirect()->back()->with('success', 'Event banner updated successfully');
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

        if(count($user->events) == 0) {
            return redirect()->route('editProfileForm', ['user' => $user->id]);
        }

        return redirect()->back()->with('success', 'Event deleted successfully!');
    }

    /**
     * Events mass edit
     *
     * @param User $user
     * @param Event $event
     * @param MassUpdateEventRequest $request
     * @return RedirectResponse
     */
    public function editAllEvent(User $user, Event $event, MassUpdateEventRequest $request): RedirectResponse
    {
        $event->editAll($user, $request, $this->propertiesService);

        return redirect()->back()->with('success', 'Events updated successfully!');
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

    public function createMailForm(User $user)
    {
        return view('event.write-mail', compact('user'));
    }

    public function createMail(User $user, Request $request) {
        dd($request);
    }
}
