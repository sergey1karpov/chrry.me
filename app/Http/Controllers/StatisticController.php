<?php

namespace App\Http\Controllers;

use App\Services\StatsService;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class StatisticController extends Controller
{
    /**
     * Collection of statistics on clicks on links
     *
     * @return void
     */
    public function clickLinkStatistic(): void
    {
        StatsService::clickLinkStatistic();
    }

    /**
     * Get links statistics
     *
     * @param int $id
     * @param int $link
     * @return Application|Factory|View
     */
    public function showClickLinkStatistic(int $id, int $link): View|Factory|Application
    {
        $user = User::where('id', $id)->firstOrFail();

        $day = StatsService::getUserLinkStatsByDay($user, $link);
        $month = StatsService::getUserLinkStatsByMonth($user,$link);
        $year = StatsService::getUserLinkStatsByYear($user, $link);
        $all = StatsService::getAllUserLinkStats($user, $link);

        return view('link.stat', compact('user', 'link', 'day', 'month', 'year', 'all'));
    }

    /**
     * Collection of statistics on clicks on products
     *
     * @return void
     */
    public function productStats(): void
    {
        StatsService::productViewStats();
    }
}
