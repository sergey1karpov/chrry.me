<?php

namespace App\Services;

use App\Models\Link;
use App\Models\LinkStat;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class StatsService
{
    /**
     * @param User $user
     * @param Link $link
     * @param Request $request
     * @return array
     */
    public function getClickLinkStatistic(User $user, Link $link, Request $request): array
    {
        $stats['count'] = LinkStat::stat($link->id, $request->query('from'), $request->query('to'))->get();

        $stats['city'] = LinkStat::stat($link->id, $request->query('from'), $request->query('to'))
            ->select('city', DB::raw('COUNT(city) as count'))
            ->orderByRaw('COUNT(city) DESC')
            ->groupBy('city')
            ->get();

        $stats['country'] = LinkStat::stat($link->id, $request->query('from'), $request->query('to'))
            ->select('country', DB::raw('COUNT(country) as count'))
            ->orderByRaw('COUNT(country) DESC')
            ->groupBy('country')
            ->get();

        return $stats;
    }
}
