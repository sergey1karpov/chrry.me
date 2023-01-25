<?php

namespace App\Models;

use App\Interfaces\Statistic;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Stats extends Model implements Statistic
{
    use HasFactory;

    protected $table = 'stats';

//    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'guest_ip',
        'country',
        'city',
        'country_code',
        'created_at',
    ];

    public function scopeStat($query, $from, $to)
    {
        return $query->where('user_id', Auth::user()->id)
            ->where('created_at', '>=', Carbon::parse($from)->format('Y-m-d H:i:00'))
            ->where('created_at', '<=', Carbon::parse($to)->format('Y-m-d H:i:00'));
    }
}
