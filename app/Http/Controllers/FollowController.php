<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\Countries;
use App\Models\EventsFollow;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FollowController extends Controller
{
    /**
     * User events follow model App\Models\EventsFollow
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function createFollow(Request $request): JsonResponse
    {
        $model = 'App\Models\\' . $request->page_type . 'Follow';

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'name' => 'required|max:150|string',
            'city_id' => 'required',
            'telegram' => 'nullable|url',
            'telephone' => 'nullable|numeric|digits_between:1,20',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $userFollow = $model::where('user_id', $request->user_id)
            ->where('email', $request->email)
            ->first();

        if($userFollow) {
            return response()->json(['errors' => $validator->errors()->add('already-follow', 'Вы уже подписались на этого пользователя')]);
        }

        $model::create([
            'user_id' => $request->user_id,
            'city_id' => $request->city_id,
            'name' => $request->name,
            'email' => $request->email,
            'telegram' => $request->telegram,
            'telephone' => $request->telephone,
            'country_id' => $this->searchCountryId($request->city_id),
            'created_at' => today(),
        ]);

        return response()->json(['success'=>'Record is successfully added']);
    }

    /**
     * @param int $cityId
     * @return int
     */
    public function searchCountryId(int $cityId): int
    {
        $city = Cities::find($cityId);

        $country = \DB::table('country')
            ->select('country.*')
            ->join('region', 'region.country_id', 'country.id')
            ->where('region.id', $city->region_id)
            ->first();

        return $country->id;
    }

    /**
     * @param User $user
     * @return View
     */
    public function getAllEventFollowers(User $user): View
    {
        $countries = DB::table('event_follows')
            ->join('country', 'country.id', 'event_follows.country_id')
            ->select('event_follows.country_id', 'country.name', DB::raw('COUNT(event_follows.city_id) as countFollowers'))
            ->where('event_follows.user_id', $user->id)
            ->groupBy('event_follows.country_id', 'country.name')
            ->orderByRaw('COUNT(event_follows.city_id) DESC')
            ->get();

        return view('event.all-followers', compact('user', 'countries'));
    }

    /**
     * @param User $user
     * @param Countries $country
     * @return View
     */
    public function getAllEventCities(User $user, Countries $country): View
    {
        $cities = DB::table('event_follows')
            ->join('city', 'city.id', 'event_follows.city_id')
            ->select('event_follows.city_id', 'city.name', 'event_follows.country_id', DB::raw('COUNT(event_follows.city_id) as countFollowers'))
            ->where('event_follows.user_id', $user->id)
            ->where('event_follows.country_id', $country->id)
            ->groupBy('event_follows.city_id', 'city.name', 'event_follows.country_id')
            ->orderByRaw('COUNT(event_follows.city_id) DESC')
            ->get();

        return view('event.all-cities-followers', compact('user', 'cities'));
    }

    /**
     * @param User $user
     * @param Countries $country
     * @param Cities $city
     * @return View
     */
    public function getAllCityFollowers(User $user, Countries $country, Cities $city): View
    {
        $followers = EventsFollow::where('user_id', $user->id)
            ->where('country_id', $country->id)
            ->where('city_id', $city->id)
            ->orderByDesc('created_at')
            ->paginate(50);

        return view('event.event-followers', compact('user', 'followers', 'city', 'country'));
    }

    /**
     * @param User $user
     * @param Countries $country
     * @param Cities $city
     * @param Request $request
     * @return View
     */
    public function sortFollowers(User $user, Countries $country, Cities $city, Request $request): View
    {
        $followers = EventsFollow::where('user_id', $user->id)
            ->where('country_id', $country->id)
            ->where('city_id', $city->id)
            ->where(function (Builder $query) use ($request) {
                if($request->query('from') == null && $request->query('to') == null) {
                    $query->whereBetween('created_at', ['1990-11-26 00:00:00', today()]);
                } else {
                    $startDate = Carbon::createFromFormat('m/d/Y', $request->query('from'))
                        ->format('Y-m-d 00:00:00');
                    $endDate = Carbon::createFromFormat('m/d/Y', $request->query('to'))
                        ->format('Y-m-d 00:00:00');
                    $query->whereBetween('created_at', [$startDate, $endDate]);
                }
            })
            ->orderByDesc('created_at')
            ->paginate(50);

        return view('event.event-followers', compact('user', 'followers', 'city', 'country'));
    }
}
