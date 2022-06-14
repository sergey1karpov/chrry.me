<?php

namespace App\Http\Controllers;

use App\Services\StatsService;
use App\Models\User;

class StatisticController extends Controller
{
    public function clickLinkStatistic()
    {
        StatsService::clickLinkStatistic();
    }

    public function showClickLinkStatistic($id, $link)
    {
        $user = User::where('id', $id)->firstOrFail();

        $day = StatsService::getUserLinkStatsByDay($user, $link);
        $month = StatsService::getUserLinkStatsByMonth($user,$link);
        $year = StatsService::getUserLinkStatsByYear($user, $link);
        $all = StatsService::getAllUserLinkStats($user, $link);

        return view('user.link-stat', compact('user', 'link', 'day', 'month', 'year', 'all'));
    }
}
