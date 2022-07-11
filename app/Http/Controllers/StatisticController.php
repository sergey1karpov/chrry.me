<?php

namespace App\Http\Controllers;

use App\Services\StatsService;
use App\Models\User;

class StatisticController extends Controller
{
    /**
     * @return void
     *
     * Сбор статистики по кликам по ссылкам
     */
    public function clickLinkStatistic() : void
    {
        StatsService::clickLinkStatistic();
    }

    /**
     * @param int $id
     * @param int $link
     *
     * @return mixed
     *
     * Отображение статистики по кликам за день, месяц, год, всё время
     */
    public function showClickLinkStatistic(int $id, int $link) : mixed
    {
        $user = User::where('id', $id)->firstOrFail();

        $day = StatsService::getUserLinkStatsByDay($user, $link);
        $month = StatsService::getUserLinkStatsByMonth($user,$link);
        $year = StatsService::getUserLinkStatsByYear($user, $link);
        $all = StatsService::getAllUserLinkStats($user, $link);

        return view('user.link-stat', compact('user', 'link', 'day', 'month', 'year', 'all'));
    }
}
