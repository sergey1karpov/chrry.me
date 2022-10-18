<?php

namespace App\Services;

use App\Models\Stats;
use Illuminate\Support\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use App\Models\LinkStat;

class StatsService
{
    /**
     * @param User $user
     * @return void
     *
     * Создание статистики по просмотрам профиля
     */
    public static function createUserStats(User $user)
    {
//        $response = Http::get('http://ip-api.com/php/' . $_SERVER['REMOTE_ADDR']);
//        $data = unserialize($response->body());

        $stat = Stats::where('guest_ip', $_SERVER['REMOTE_ADDR'])
            ->where('created_at', Carbon::today())
            ->where('user_id', $user->id)
            ->first();

        if(null == $stat) {
            $profileStat = new Stats();
            $profileStat->user_id = $user->id;
            $profileStat->guest_ip = $_SERVER['REMOTE_ADDR'];
            $profileStat->created_at = Carbon::today();
//            $profileStat->city = $data['city'];
//            $profileStat->country = $data['country'];
//            $profileStat->country_code = $data['country'];
            $profileStat->save();
        }
    }

    /**
     * @param User $user
     * @return void
     *
     * Создание статистики по кликам по ссылкам
     */
    public static function clickLinkStatistic()
    {
//        $response = Http::get('http://ip-api.com/php/' . $_POST['guest_ip']);
//        $data = unserialize($response->body());

        $stat = LinkStat::where('guest_ip', $_POST['guest_ip'])
            ->where('created_at', Carbon::today())
            ->where('user_id', $_POST['user_id'])
            ->where('link_id', $_POST['link_id'])
            ->first();

        if(false == $stat) {
            $func = $_POST['func'];
            if ($func === 'func_data') {

                $linkStat = new LinkStat();
                $linkStat->user_id = $_POST['user_id'];
                $linkStat->link_id = $_POST['link_id'];
                $linkStat->guest_ip = $_POST['guest_ip'];
                $linkStat->created_at = Carbon::today();
//                $linkStat->city = $data['city'];
//                $linkStat->country = $data['country'];
//                $linkStat->country_code = $data['countryCode'];
                $linkStat->save();

            }
        }
    }

    public static function getUserStatsByDay(User $user)
    {
        $data['stat'] = Stats::todayUser(Carbon::today(), $user->id)->get();
        $data['uniqueCity'] = Stats::todayUser(Carbon::today(), $user->id)->count('city')->get();
        $data['uniqueCountry'] = Stats::todayUser(Carbon::today(), $user->id)->count('country')->get();

        return $data;
    }

    public static function getUserStatsByMonth(User $user) //Статистика за месяц
    {
        $data['stat'] = Stats::whereMonth('created_at', Carbon::now()->month)->where('user_id', $user->id)->get();
        $data['uniqueCity'] = \DB::table('stats')->whereMonth('created_at', Carbon::today())->where('user_id', $user->id)->select('city', \DB::raw('COUNT(city) as count'))->orderByRaw('COUNT(city) DESC')->groupBy('city')->get();
        $data['uniqueCountry'] = \DB::table('stats')->whereMonth('created_at', Carbon::today())->where('user_id', $user->id)->select('country', \DB::raw('COUNT(country) as count'))->orderByRaw('COUNT(country) DESC')->groupBy('country')->get();

        return $data;
    }

    /**
     * @param User $user
     * @return array
     *
     * Return user profile stats for year
     */
    public static function getUserStatsByYear(User $user) //Статистика за год
    {
        $data['stat'] = Stats::whereYear('updated_at', Carbon::now()->year)->where('user_id', $user->id)->get();
        $data['uniqueCity'] = \DB::table('stats')->whereYear('created_at', Carbon::today())->where('user_id', $user->id)->select('city', \DB::raw('COUNT(city) as count'))->orderByRaw('COUNT(city) DESC')->groupBy('city')->get();
        $data['uniqueCountry'] = \DB::table('stats')->whereYear('created_at', Carbon::today())->where('user_id', $user->id)->select('country', \DB::raw('COUNT(country) as count'))->orderByRaw('COUNT(country) DESC')->groupBy('country')->get();

        return $data;
    }

    /**
     * @param User $user
     * @return array
     *
     * Return user profile stats for all time
     */
    public static function getAllUserStats(User $user) //Вся стата
    {
        $data['stat'] = Stats::where('user_id', $user->id)->get();
        $data['uniqueCity'] = \DB::table('stats')->where('user_id', $user->id)->select('city', \DB::raw('COUNT(city) as count'))->orderByRaw('COUNT(city) DESC')->groupBy('city')->get();
        $data['uniqueCountry'] = \DB::table('stats')->where('user_id', $user->id)->select('country', \DB::raw('COUNT(country) as count'))->orderByRaw('COUNT(country) DESC')->groupBy('country')->get();

        return $data;
    }

    /**
     * @param $user
     * @param $link
     * @return array
     *
     * Return stats for link by day
     */
    public static function getUserLinkStatsByDay($user, $link) //Статистика за день
    {
        $data['stat'] = LinkStat::where('created_at', Carbon::today())->where('user_id', $user->id)->where('link_id', $link)->get();
        $data['uniqueCity'] = \DB::table('link_stat')->where('link_id', $link)->where('created_at', Carbon::today())->where('user_id', $user->id)->select('city', \DB::raw('COUNT(city) as count'))->orderByRaw('COUNT(city) DESC')->groupBy('city')->get();
        $data['uniqueCountry'] = \DB::table('link_stat')->where('link_id', $link)->where('created_at', Carbon::today())->where('user_id', $user->id)->select('country', \DB::raw('COUNT(country) as count'))->orderByRaw('COUNT(country) DESC')->groupBy('country')->get();

        return $data;
    }

    /**
     * @param $user
     * @param $link
     * @return array
     *
     * Return stats for link by month
     */
    public static function getUserLinkStatsByMonth(User $user, int $link)//Статистика за месяц
    {
        $data['stat'] = LinkStat::whereMonth('created_at', Carbon::now()->month)->where('user_id', $user->id)->where('link_id',  $link)->get();
        $data['uniqueCity'] = \DB::table('link_stat')->where('link_id', $link)->whereMonth('created_at', Carbon::today())->where('user_id', $user->id)->select('city', \DB::raw('COUNT(city) as count'))->orderByRaw('COUNT(city) DESC')->groupBy('city')->get();
        $data['uniqueCountry'] = \DB::table('link_stat')->where('link_id', $link)->whereMonth('created_at', Carbon::today())->where('user_id', $user->id)->select('country', \DB::raw('COUNT(country) as count'))->orderByRaw('COUNT(country) DESC')->groupBy('country')->get();

        return $data;
    }

    /**
     * @param $user
     * @param $link
     * @return array
     *
     * Return stats for link by year
     */
    public static function getUserLinkStatsByYear(User $user, int $link) //Статистика за год
    {
        $data['stat'] = LinkStat::whereYear('created_at', Carbon::now()->year)->where('user_id', $user->id)->where('link_id', $link)->get();
        $data['uniqueCity'] = \DB::table('link_stat')->where('link_id', $link)->whereYear('created_at', Carbon::today())->where('user_id', $user->id)->select('city', \DB::raw('COUNT(city) as count'))->orderByRaw('COUNT(city) DESC')->groupBy('city')->get();
        $data['uniqueCountry'] = \DB::table('link_stat')->where('link_id', $link)->whereYear('created_at', Carbon::today())->where('user_id', $user->id)->select('country', \DB::raw('COUNT(country) as count'))->orderByRaw('COUNT(country) DESC')->groupBy('country')->get();

        return $data;
    }

    /**
     * @param $user
     * @param $link
     * @return array
     *
     * Return stats for link by for all time
     */
    public static function getAllUserLinkStats(User $user, int $link) //Вся стата
    {
        $data['stat'] = LinkStat::where('user_id', $user->id)->where('link_id', $link)->get();
        $data['uniqueCity'] = \DB::table('link_stat')->where('link_id', $link)->where('user_id', $user->id)->select('city', \DB::raw('COUNT(city) as count'))->orderByRaw('COUNT(city) DESC')->groupBy('city')->get();
        $data['uniqueCountry'] = \DB::table('link_stat')->where('link_id', $link)->where('user_id', $user->id)->select('country', \DB::raw('COUNT(country) as count'))->orderByRaw('COUNT(country) DESC')->groupBy('country')->get();

        return $data;
    }
}
