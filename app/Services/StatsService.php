<?php

namespace App\Services;

use App\Models\Stats;
use Illuminate\Support\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class StatsService
{
    public static function createUserStats(User $user)
    {
        $response = Http::get('http://ip-api.com/php/' . $_SERVER['REMOTE_ADDR']);
        $array = unserialize($response->body());

        $stat = Stats::where('guest_ip', $_SERVER['REMOTE_ADDR'])->where('created_at', Carbon::today())->where('user_id', $user->id)->first();
        if(false == $stat) {
            $stats = new Stats();
            $stats->user_id    = $user->id;
            $stats->guest_ip   = $_SERVER['REMOTE_ADDR'];
            $stats->created_at = Carbon::today();
            $stats->city = $array['city'];
            $stats->country = $array['country'];
            $stats->country_code = $array['countryCode'];

            $stats->save();
        }
    }

    public static function getUserStatsByDay(User $user) //Статистика за день
    {
        $data['stat'] = Stats::where('created_at', Carbon::today())->where('user_id', $user->id)->get();
        $data['uniqueCity'] = \DB::table('stats')->where('created_at', Carbon::today())->where('user_id', $user->id)->select('city', \DB::raw('COUNT(city) as count'))->groupBy('city')->get();
        $data['uniqueCountry'] = \DB::table('stats')->where('created_at', Carbon::today())->where('user_id', $user->id)->select('country', \DB::raw('COUNT(country) as count'))->groupBy('country')->get();

        return $data;
    }

    public static function fetUserStatsByMonth(User $user) //Статистика за месяц
    {
        $data['stat'] = Stats::whereMonth('created_at', Carbon::now()->month)->where('user_id', $user->id)->get();
        $data['uniqueCity'] = \DB::table('stats')->whereMonth('created_at', Carbon::today())->where('user_id', $user->id)->select('city', \DB::raw('COUNT(city) as count'))->groupBy('city')->get();
        $data['uniqueCountry'] = \DB::table('stats')->whereMonth('created_at', Carbon::today())->where('user_id', $user->id)->select('country', \DB::raw('COUNT(country) as count'))->groupBy('country')->get();

        return $data;
    }

    public static function getUserStatsByYear(User $user) //Статистика за год
    {
        $data['stat'] = Stats::whereYear('updated_at', Carbon::now()->year)->where('user_id', $user->id)->get();
        $data['uniqueCity'] = \DB::table('stats')->whereYear('created_at', Carbon::today())->where('user_id', $user->id)->select('city', \DB::raw('COUNT(city) as count'))->groupBy('city')->get();
        $data['uniqueCountry'] = \DB::table('stats')->whereYear('created_at', Carbon::today())->where('user_id', $user->id)->select('country', \DB::raw('COUNT(country) as count'))->groupBy('country')->get();

        return $data;
    }

    public static function getAllUserStats(User $user) //Вся стата
    {
        $data['stat'] = Stats::where('user_id', $user->id)->get();
        $data['uniqueCity'] = \DB::table('stats')->where('user_id', $user->id)->select('city', \DB::raw('COUNT(city) as count'))->groupBy('city')->get();
        $data['uniqueCountry'] = \DB::table('stats')->where('user_id', $user->id)->select('country', \DB::raw('COUNT(country) as count'))->groupBy('country')->get();

        return $data;
    }
}
