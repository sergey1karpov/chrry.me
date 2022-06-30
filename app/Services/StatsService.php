<?php

namespace App\Services;

use App\Models\Stats;
use Illuminate\Support\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use App\Models\LinkStat;

class StatsService
{
    public static function createUserStats(User $user) : void
    {
        // $response = Http::get('http://ip-api.com/php/' . $_SERVER['REMOTE_ADDR']);
        // $array = unserialize($response->body());

        $stat = Stats::where('guest_ip', $_SERVER['REMOTE_ADDR'])->where('created_at', Carbon::today())->where('user_id', $user->id)->first();
        if(false == $stat) {
            $stats = new Stats();
            $stats->user_id    = $user->id;
            $stats->guest_ip   = $_SERVER['REMOTE_ADDR'];
            $stats->created_at = Carbon::today();
            // $stats->city = $array['city'];
            // $stats->country = $array['country'];
            // $stats->country_code = $array['countryCode'];

            $stats->save();
        }
    }

    public static function clickLinkStatistic() : void
    {
        // $response = Http::get('http://ip-api.com/php/' . $_POST['guest_ip']);
        // $data = unserialize($response->body());

        $stat = LinkStat::where('guest_ip', $_POST['guest_ip'])->where('created_at', Carbon::today())->where('user_id', $_POST['user_id'])->where('link_id', $_POST['link_id'])->first();

        if(false == $stat) {
            $func = $_POST['func'];
            if ($func === 'func_data') {

                $linkStat = new LinkStat();
                $linkStat->user_id = $_POST['user_id'];
                $linkStat->link_id = $_POST['link_id'];
                $linkStat->guest_ip = $_POST['guest_ip'];
                $linkStat->created_at = Carbon::today();
                // $linkStat->city = $data['city'];
                // $linkStat->country = $data['country'];
                // $linkStat->country_code = $data['countryCode'];
                $linkStat->save();

            }
        }
    }

    public static function getUserStatsByDay(User $user) //Статистика за день
    {
        $data['stat'] = Stats::where('created_at', Carbon::today())->where('user_id', $user->id)->get();
        $data['uniqueCity'] = \DB::table('stats')->where('created_at', Carbon::today())->where('user_id', $user->id)->select('city', \DB::raw('COUNT(city) as count'))->orderByRaw('COUNT(city) DESC')->groupBy('city')->get(); //LIMIT ???
        $data['uniqueCountry'] = \DB::table('stats')->where('created_at', Carbon::today())->where('user_id', $user->id)->select('country', \DB::raw('COUNT(country) as count'))->orderByRaw('COUNT(country) DESC')->groupBy('country')->get();

        return $data;
    }

    public static function getUserStatsByMonth(User $user) //Статистика за месяц
    {
        $data['stat'] = Stats::whereMonth('created_at', Carbon::now()->month)->where('user_id', $user->id)->get();
        $data['uniqueCity'] = \DB::table('stats')->whereMonth('created_at', Carbon::today())->where('user_id', $user->id)->select('city', \DB::raw('COUNT(city) as count'))->orderByRaw('COUNT(city) DESC')->groupBy('city')->get();
        $data['uniqueCountry'] = \DB::table('stats')->whereMonth('created_at', Carbon::today())->where('user_id', $user->id)->select('country', \DB::raw('COUNT(country) as count'))->orderByRaw('COUNT(country) DESC')->groupBy('country')->get();

        return $data;
    }

    public static function getUserStatsByYear(User $user) //Статистика за год
    {
        $data['stat'] = Stats::whereYear('updated_at', Carbon::now()->year)->where('user_id', $user->id)->get();
        $data['uniqueCity'] = \DB::table('stats')->whereYear('created_at', Carbon::today())->where('user_id', $user->id)->select('city', \DB::raw('COUNT(city) as count'))->orderByRaw('COUNT(city) DESC')->groupBy('city')->get();
        $data['uniqueCountry'] = \DB::table('stats')->whereYear('created_at', Carbon::today())->where('user_id', $user->id)->select('country', \DB::raw('COUNT(country) as count'))->orderByRaw('COUNT(country) DESC')->groupBy('country')->get();

        return $data;
    }

    public static function getAllUserStats(User $user) //Вся стата
    {
        $data['stat'] = Stats::where('user_id', $user->id)->get();
        $data['uniqueCity'] = \DB::table('stats')->where('user_id', $user->id)->select('city', \DB::raw('COUNT(city) as count'))->orderByRaw('COUNT(city) DESC')->groupBy('city')->get();
        $data['uniqueCountry'] = \DB::table('stats')->where('user_id', $user->id)->select('country', \DB::raw('COUNT(country) as count'))->orderByRaw('COUNT(country) DESC')->groupBy('country')->get();

        return $data;
    }

    //Links

    public static function getUserLinkStatsByDay($user, $link) //Статистика за день
    {
        $data['stat'] = LinkStat::where('created_at', Carbon::today())->where('user_id', $user->id)->where('link_id', $link)->get();
        $data['uniqueCity'] = \DB::table('link_stat')->where('link_id', $link)->where('created_at', Carbon::today())->where('user_id', $user->id)->select('city', \DB::raw('COUNT(city) as count'))->orderByRaw('COUNT(city) DESC')->groupBy('city')->get();
        $data['uniqueCountry'] = \DB::table('link_stat')->where('link_id', $link)->where('created_at', Carbon::today())->where('user_id', $user->id)->select('country', \DB::raw('COUNT(country) as count'))->orderByRaw('COUNT(country) DESC')->groupBy('country')->get();

        return $data;
    }

    public static function getUserLinkStatsByMonth(User $user, int $link)//Статистика за месяц
    {
        $data['stat'] = LinkStat::whereMonth('created_at', Carbon::now()->month)->where('user_id', $user->id)->where('link_id',  $link)->get();
        $data['uniqueCity'] = \DB::table('link_stat')->where('link_id', $link)->whereMonth('created_at', Carbon::today())->where('user_id', $user->id)->select('city', \DB::raw('COUNT(city) as count'))->orderByRaw('COUNT(city) DESC')->groupBy('city')->get();
        $data['uniqueCountry'] = \DB::table('link_stat')->where('link_id', $link)->whereMonth('created_at', Carbon::today())->where('user_id', $user->id)->select('country', \DB::raw('COUNT(country) as count'))->orderByRaw('COUNT(country) DESC')->groupBy('country')->get();

        return $data;
    }

    public static function getUserLinkStatsByYear(User $user, int $link) //Статистика за год
    {
        $data['stat'] = LinkStat::whereYear('created_at', Carbon::now()->year)->where('user_id', $user->id)->where('link_id', $link)->get();
        $data['uniqueCity'] = \DB::table('link_stat')->where('link_id', $link)->whereYear('created_at', Carbon::today())->where('user_id', $user->id)->select('city', \DB::raw('COUNT(city) as count'))->orderByRaw('COUNT(city) DESC')->groupBy('city')->get();
        $data['uniqueCountry'] = \DB::table('link_stat')->where('link_id', $link)->whereYear('created_at', Carbon::today())->where('user_id', $user->id)->select('country', \DB::raw('COUNT(country) as count'))->orderByRaw('COUNT(country) DESC')->groupBy('country')->get();

        return $data;
    }

    public static function getAllUserLinkStats(User $user, int $link) //Вся стата
    {
        $data['stat'] = LinkStat::where('user_id', $user->id)->where('link_id', $link)->get();
        $data['uniqueCity'] = \DB::table('link_stat')->where('link_id', $link)->where('user_id', $user->id)->select('city', \DB::raw('COUNT(city) as count'))->orderByRaw('COUNT(city) DESC')->groupBy('city')->get();
        $data['uniqueCountry'] = \DB::table('link_stat')->where('link_id', $link)->where('user_id', $user->id)->select('country', \DB::raw('COUNT(country) as count'))->orderByRaw('COUNT(country) DESC')->groupBy('country')->get();

        return $data;
    }
}
