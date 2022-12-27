<?php

namespace App\Http\Controllers;

use App\Jobs\ProductViewJob;
use App\Models\Link;
use App\Models\Stats;
use App\Services\CreateClickLinkStatistics;
use App\Services\CreateProductsViewStatistics;
use App\Services\StatsService;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    public function __construct (
        private readonly CreateClickLinkStatistics $linkStatistics,
        private readonly CreateProductsViewStatistics $productStatistics,
    ) {}

    public function clickLinkStatistic(User $user, Request $request): RedirectResponse
    {
        $this->linkStatistics->createStatistics($user, $request->server->get('REMOTE_ADDR'), $request);

        return redirect()->to($request->link_url);
    }

    public function productStats(User $user, Request $request): RedirectResponse
    {
        ProductViewJob::dispatch($user, $request->server->get('REMOTE_ADDR'), $request->all(), $this->productStatistics);

        return redirect()->route('showProductDetails', ['user' => $user->slug, 'product' => $request->product_id]);
    }

    public function getCountStat()
    {

    }

    public function getCityStat()
    {

    }

    public function getCountryStat()
    {

    }

    public function filterStats(User $user, Request $request)
    {
        $stats['count'] = DB::table($request->query('table'))
            ->where('user_id', $user->id)
            ->when($request->query('table') == 'stats_product', function ($query) use ($request) {
                $query->where('product_id', $request->query('product'))
                    ->whereBetween('created_at', [$request->query('from'), $request->query('to')]);
            })
            ->when($request->query('table') == 'stats', function ($query) use ($request) {
                $query->whereBetween('created_at', [$request->query('from'), $request->query('to')]);
            })
            ->when($request->query('table') == 'link_stat', function ($query) use ($request) {
                $query->where('link_id', $request->query('link'))
                    ->whereBetween('created_at', [$request->query('from'), $request->query('to')]);
            })->get();

        $stats['city'] = DB::table($request->query('table'))
            ->where('user_id', $user->id)
            ->when($request->query('table') == 'stats_product', function ($query) use ($request) {
                $query->select('city', DB::raw('COUNT(city) as count'))->orderByRaw('COUNT(city) DESC')
                    ->where('product_id', $request->query('product'))
                    ->whereBetween('created_at', [$request->query('from'), $request->query('to')])
                    ->groupBy('city');
            })
            ->when($request->query('table') == 'stats', function ($query) use ($request) {
                $query->select('city', DB::raw('COUNT(city) as count'))->orderByRaw('COUNT(city) DESC')
                    ->whereBetween('created_at', [$request->query('from'), $request->query('to')])
                    ->groupBy('city');
            })
            ->when($request->query('table') == 'link_stat', function ($query) use ($request) {
                $query->select('city', DB::raw('COUNT(city) as count'))->orderByRaw('COUNT(city) DESC')
                    ->where('link_id', $request->query('link'))
                    ->whereBetween('created_at', [$request->query('from'), $request->query('to')])
                    ->groupBy('city');
            })->get();

        $stats['country'] = DB::table($request->query('table'))
            ->where('user_id', $user->id)
            ->when($request->query('table') == 'stats_product', function ($query) use ($request) {
                $query->select('country', DB::raw('COUNT(country) as count'))->orderByRaw('COUNT(country) DESC')
                    ->where('product_id', $request->query('product'))
                    ->whereBetween('created_at', [$request->query('from'), $request->query('to')])
                    ->groupBy('country');
            })
            ->when($request->query('table') == 'stats', function ($query) use ($request) {
                $query->select('country', DB::raw('COUNT(country) as count'))->orderByRaw('COUNT(country) DESC')
                    ->whereBetween('created_at', [$request->query('from'), $request->query('to')])
                    ->groupBy('country');
            })
            ->when($request->query('table') == 'link_stat', function ($query) use ($request) {
                $query->select('country', DB::raw('COUNT(country) as count'))->orderByRaw('COUNT(country) DESC')
                    ->where('link_id', $request->query('link'))
                    ->whereBetween('created_at', [$request->query('from'), $request->query('to')])
                    ->groupBy('country');
            })->get();

        return view('statistic.user_profile', compact('user', 'stats'));
    }
}
