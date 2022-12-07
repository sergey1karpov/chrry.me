<?php

namespace App\Models;

use App\Interfaces\Statistic;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Stats extends Model implements Statistic
{
    use HasFactory;

    protected $table = 'stats';

    protected $fillable = ['user_id', 'guest_ip'];

    public function scopeTodayProfileView($query, $user)
    {
        return $query->where('created_at', Carbon::today())->where('user_id', $user);
    }

    public function scopeCountView($query, $cityOrCountry)
    {
        return $query->select($cityOrCountry, DB::raw('COUNT('.$cityOrCountry.') as count'))->orderByRaw('COUNT('.$cityOrCountry.') DESC')->groupBy($cityOrCountry);
    }

    public function scopeMonthProfileView($query, $user)
    {
        return $query->whereMonth('created_at', Carbon::now()->month)->where('user_id', $user);
    }

    public function scopeYearProfileView($query, $user)
    {
        return $query->whereYear('updated_at', Carbon::now()->year)->where('user_id', $user);
    }
}
