<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventsFollow extends Model
{
    use HasFactory;

    protected $table = 'event_follows';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'telegram',
        'telephone',
        'city_id',
        'user_id',
        'country_id',
        'created_at'
    ];
}
