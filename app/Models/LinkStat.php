<?php

namespace App\Models;

use App\Interfaces\Statistic;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class LinkStat extends Model implements Statistic
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'link_id',
        'guest_ip',
        'country',
        'city',
        'country_code',
        'created_at',
    ];

    protected $table = 'link_stat';

    public function scopeStat($query, $link, $from, $to)
    {
        return $query->where('user_id', Auth::user()->id)
            ->where('link_id', $link)
            ->where('created_at', '>=', Carbon::parse($from)->format('Y-m-d H:i:00'))
            ->where('created_at', '<=', Carbon::parse($to)->format('Y-m-d H:i:00'));
    }
}
