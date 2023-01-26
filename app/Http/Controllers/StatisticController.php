<?php

namespace App\Http\Controllers;

use App\Jobs\ProductViewJob;
use App\Models\Link;
use App\Models\Stats;
use App\Services\CreateClickLinkStatistics;
use App\Services\CreateProductsViewStatistics;
use App\Services\StatsService;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    public function __construct (
        private CreateClickLinkStatistics $linkStatistics,
        private CreateProductsViewStatistics $productStatistics,
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
}
