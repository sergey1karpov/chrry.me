<?php

namespace App\Services;

use App\Models\Product;
use App\Models\ProductStats;
use App\Models\Stats;
use Illuminate\Support\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use App\Models\LinkStat;

class StatsService
{
    /**
     * Count uniq views for user profile
     *
     * @param User $user
     * @param $guest_ip
     * @return void
     */
    public function createUserStats(User $user, $guest_ip): void
    {
        $response = Http::get('http://ip-api.com/php/' . $guest_ip);
        $data = unserialize($response->body());

        $stat = Stats::where('guest_ip', $guest_ip)
            ->where('created_at', Carbon::today())
            ->where('user_id', $user->id)
            ->first();

        if(null == $stat) {
            $profileStat = new Stats();
            $profileStat->user_id = $user->id;
            $profileStat->guest_ip = $guest_ip;
            $profileStat->created_at = Carbon::today();
            $profileStat->city = $data['city'] ?? null;
            $profileStat->country = $data['country'] ?? null;
            $profileStat->country_code = $data['country'] ?? null;
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
//
//        $stat = LinkStat::where('guest_ip', $_POST['guest_ip'])
//            ->where('created_at', Carbon::today())
//            ->where('user_id', $_POST['user_id'])
//            ->where('link_id', $_POST['link_id'])
//            ->first();
//
//        if(null == $stat) {
//            $func = $_POST['func'];
//            if ($func === 'func_data') {
//
//                $linkStat = new LinkStat();
//                $linkStat->user_id = $_POST['user_id'];
//                $linkStat->link_id = $_POST['link_id'];
//                $linkStat->guest_ip = $_POST['guest_ip'];
//                $linkStat->created_at = Carbon::today();
//                $linkStat->city = $data['city'];
//                $linkStat->country = $data['country'];
//                $linkStat->country_code = $data['countryCode'];
//                $linkStat->save();
//
//            }
//        }
    }

    public static function productViewStats()
    {
//        $response = Http::get('http://ip-api.com/php/' . $_POST['guest_ip']);
//        $data = unserialize($response->body());
//
//        $stat = ProductStats::where('guest_ip', $_POST['guest_ip'])
//            ->where('created_at', Carbon::today())
//            ->where('user_id', $_POST['user_id'])
//            ->where('product_id', $_POST['product_id'])
//            ->first();
//
//        if(null == $stat) {
//            $func = $_POST['func'];
//            if ($func === 'stat_product') {
//
//                $linkStat = new ProductStats();
//                $linkStat->user_id = $_POST['user_id'];
//                $linkStat->product_id = $_POST['product_id'];
//                $linkStat->guest_ip = $_POST['guest_ip'];
//                $linkStat->created_at = Carbon::today();
//                $linkStat->city = $data['city'];
//                $linkStat->country = $data['country'];
//                $linkStat->country_code = $data['countryCode'];
//                $linkStat->save();
//
//            }
//        }
    }

    /**
     * Get user profile stats by day
     *
     * @param User $user
     * @return array
     */
    public function getUserStatsByDay(User $user)
    {
        $data['dayStat'] = Stats::todayProfileView($user->id)->get();
        $data['dayUniqueCity'] = Stats::todayProfileView($user->id)->countView('city')->get();
        $data['dayUniqueCountry'] = Stats::todayProfileView($user->id)->countView('country')->get();

        return $data;
    }

    /**
     * Get user profile stats by month
     *
     * @param User $user
     * @return array
     */
    public function getUserStatsByMonth(User $user): array
    {
        $data['monthStat'] = Stats::monthProfileView($user->id)->get();
        $data['monthUniqueCity'] = Stats::monthProfileView($user->id)->countView('city')->get();
        $data['monthUniqueCountry'] = Stats::monthProfileView($user->id)->countView('country')->get();

        return $data;
    }

    /**
     * Return user profile stats for year
     *
     * @param User $user
     * @return array
     */
    public function getUserStatsByYear(User $user) //Статистика за год
    {
        $data['yearStat'] = Stats::yearProfileView($user->id)->get();
        $data['yearUniqueCity'] = Stats::yearProfileView($user->id)->countView('city')->get();
        $data['yearUniqueCountry'] = Stats::yearProfileView($user->id)->countView('country')->get();

        return $data;
    }

    /**
     * Return user profile stats for all time
     *
     * @param User $user
     * @return array
     */
    public function getAllUserStats(User $user) //Вся стата
    {
        $data['allStat'] = Stats::where('user_id', $user->id)->get();
        $data['allUniqueCity'] = Stats::where('user_id', $user->id)->countView('city')->get();
        $data['allUniqueCountry'] = Stats::where('user_id', $user->id)->countView('country')->get();

        return $data;
    }

    /**
     * Return stats by day, month, year and all
     *
     * @param User $user
     * @return array
     */
    public function getUserProfileStatistic(User $user): array
    {
        $dayStatistic = $this->getUserStatsByDay($user);
        $monthStatistic = $this->getUserStatsByMonth($user);
        $yearStatistic = $this->getUserStatsByYear($user);
        $allTimeStatistic = $this->getAllUserStats($user);

        return compact('dayStatistic', 'monthStatistic', 'yearStatistic', 'allTimeStatistic');
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

    public static function getProductStatistic(User $user, Product $product)
    {
        $data['one_day_view'] = ProductStats::where('created_at', Carbon::today())->where('user_id', $user->id)->where('product_id', $product->id)->get();
        $data['one_day_city_view'] = \DB::table('stats_product')->where('product_id', $product->id)->where('created_at', Carbon::today())->where('user_id', $user->id)->select('city', \DB::raw('COUNT(city) as count'))->orderByRaw('COUNT(city) DESC')->groupBy('city')->get();
        $data['one_day_country_view'] = \DB::table('stats_product')->where('product_id', $product->id)->where('created_at', Carbon::today())->where('user_id', $user->id)->select('country', \DB::raw('COUNT(country) as count'))->orderByRaw('COUNT(country) DESC')->groupBy('country')->get();

        $data['one_month_view'] = ProductStats::whereMonth('created_at', Carbon::now()->month)->where('user_id', $user->id)->where('product_id', $product->id)->get();
        $data['one_month_city_view'] = \DB::table('stats_product')->where('product_id', $product->id)->whereMonth('created_at', Carbon::today())->where('user_id', $user->id)->select('city', \DB::raw('COUNT(city) as count'))->orderByRaw('COUNT(city) DESC')->groupBy('city')->get();
        $data['one_month_country_view'] = \DB::table('stats_product')->where('product_id', $product->id)->whereMonth('created_at', Carbon::today())->where('user_id', $user->id)->select('country', \DB::raw('COUNT(country) as count'))->orderByRaw('COUNT(country) DESC')->groupBy('country')->get();

        $data['one_year_view'] = ProductStats::whereYear('created_at', Carbon::now()->year)->where('user_id', $user->id)->where('product_id', $product->id)->get();
        $data['one_year_city_view'] = \DB::table('stats_product')->where('product_id', $product->id)->whereYear('created_at', Carbon::today())->where('user_id', $user->id)->select('city', \DB::raw('COUNT(city) as count'))->orderByRaw('COUNT(city) DESC')->groupBy('city')->get();
        $data['one_year_country_view'] = \DB::table('stats_product')->where('product_id', $product->id)->whereYear('created_at', Carbon::today())->where('user_id', $user->id)->select('country', \DB::raw('COUNT(country) as count'))->orderByRaw('COUNT(country) DESC')->groupBy('country')->get();

        $data['all_view'] = ProductStats::where('user_id', $user->id)->where('product_id', $product->id)->get();
        $data['all_city'] = \DB::table('stats_product')->where('product_id', $product->id)->where('user_id', $user->id)->select('city', \DB::raw('COUNT(city) as count'))->orderByRaw('COUNT(city) DESC')->groupBy('city')->get();
        $data['all_country'] = \DB::table('stats_product')->where('product_id', $product->id)->where('user_id', $user->id)->select('country', \DB::raw('COUNT(country) as count'))->orderByRaw('COUNT(country) DESC')->groupBy('country')->get();

        return $data;
    }
}
