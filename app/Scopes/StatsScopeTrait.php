<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

trait StatsScopeTrait
{
    /**
     * @param $query
     * @param $from
     * @param $to
     * @return Builder
     */
    protected function scopeFromTime($query, $from, $to): Builder
    {
        return $query->where('user_id', Auth::user()->id)
            ->where('created_at', '>=', Carbon::parse($from)->format('Y-m-d H:i:00'))
            ->where('created_at', '<=', Carbon::parse($to)->format('Y-m-d H:i:00'));
    }

    /**
     * @param $query
     * @param $value
     * @return Builder
     */
    protected function scopeFilter($query, $value): Builder
    {
        return $query->select("$value", DB::raw("COUNT($value) as count"))
            ->orderByRaw("COUNT($value) DESC")
            ->groupBy("$value");
    }
}
