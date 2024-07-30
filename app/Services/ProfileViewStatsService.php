<?php

namespace App\Services;

use App\Http\Requests\FilterStatRequest;
use App\Models\Stats;
use Illuminate\Database\Eloquent\Collection;

final class ProfileViewStatsService
{
    /**
     * Total profile stats by view
     *
     * @param FilterStatRequest $request
     * @return array
     */
    public function getTotalStatistic(FilterStatRequest $request): array
    {
        $stats['count'] = $this->getTotalStatisticByTime(
            new Stats(),
            $request->query('from'),
            $request->query('to')
        );

        $stats['city'] = $this->getTotalStatisticByCityOrCountry(
            new Stats(),
            $request->query('from'),
            $request->query('to'),
            'city'
        );

        $stats['country'] = $this->getTotalStatisticByCityOrCountry(
            new Stats(),
            $request->query('from'),
            $request->query('to'),
            'country'
        );

        return $stats;
    }

    /**
     * @param Stats $model
     * @param string $from
     * @param string $to
     * @return Collection
     */
    public function getTotalStatisticByTime(Stats $model, string $from, string $to): Collection
    {
        /**
         * stat() scope from model app\Models\Stats
         */
        return $model::fromTime($from, $to)->get();
    }

    /**
     * @param Stats $model
     * @param string $from
     * @param string $to
     * @param string $location
     * @return Collection
     */
    public function getTotalStatisticByCityOrCountry(Stats $model, string $from, string $to, string $location): Collection
    {
        /**
         * stat() scope from model app\Models\Stats
         * filter() scope from model by use trait app\Scopes\StatsScopeTrait
         */
        return $model::fromTime($from, $to)->filter($location)->get();
    }
}
