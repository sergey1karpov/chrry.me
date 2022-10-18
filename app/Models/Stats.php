<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Stats extends Model
{
    use HasFactory;

    protected $table = 'stats';

    protected $fillable = ['user_id', 'guest_ip'];

    public function scopeTodayUser($query, $date, $user)
    {
        return $query->where('created_at', $date)->where('user_id', $user);
    }

    public function scopeCount($query, $cityOrCountry)
    {
        return $query->select($cityOrCountry, DB::raw('COUNT('.$cityOrCountry.') as count'))->orderByRaw('COUNT('.$cityOrCountry.') DESC')->groupBy($cityOrCountry);
    }
}
