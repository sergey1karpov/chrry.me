<?php

namespace App\Models;

use App\Interfaces\Statistic;
use App\Scopes\StatsScopeTrait;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Stats extends Model implements Statistic
{
    use HasFactory, StatsScopeTrait;

    protected $table = 'stats';

    protected $fillable = [
        'user_id',
        'guest_ip',
        'country',
        'city',
        'country_code',
        'created_at',
    ];
}
