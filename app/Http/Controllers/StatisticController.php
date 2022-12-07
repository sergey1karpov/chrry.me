<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Services\CreateClickLinkStatistics;
use App\Services\CreateProductsViewStatistics;
use App\Services\StatsService;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function __construct (
        private readonly CreateClickLinkStatistics $linkStatistics,
        private readonly CreateProductsViewStatistics $productStatistics,
    ) {}

    public function clickLinkStatistic(User $user, Request $request)
    {
        $this->linkStatistics->createStatistics($user, $request->server->get('REMOTE_ADDR'), $request);

        return redirect()->to($request->link_url);
    }

    public function productStats(User $user, Request $request)
    {
        $this->productStatistics->createStatistics($user, $request->server->get('REMOTE_ADDR'), $request);

        return redirect()->route('showProductDetails', ['user' => $user->slug, 'product' => $request->product_id]);
    }

    /**
     * Get links statistics
     *
     * @param User $user
     * @param Link $link
     * @return Application|Factory|View
     */
    public function showClickLinkStatistic(User $user, Link $link): View|Factory|Application
    {
        $day = StatsService::getUserLinkStatsByDay($user, $link);
        $month = StatsService::getUserLinkStatsByMonth($user,$link);
        $year = StatsService::getUserLinkStatsByYear($user, $link);
        $all = StatsService::getAllUserLinkStats($user, $link);

        return view('link.stat', compact('user', 'link', 'day', 'month', 'year', 'all'));
    }
}
