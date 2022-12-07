<?php

namespace App\Models;

use App\Interfaces\Statistic;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkStat extends Model implements Statistic
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'link_id',
        'guest_ip',
        'country',
        'city',
        'country_code'
    ];

    protected $table = 'link_stat';
}
