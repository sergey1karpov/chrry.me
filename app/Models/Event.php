<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description', 
        'location', 
        'time', 
        'date', 
        'banner', 
        'video', 
        'media', 
        'tickets', 
        'user_id', 
        'link_id', 
        'city',
        'location_font',
        'location_font_size',
        'location_font_color',
        'date_font',
        'date_font_size',
        'date_font_color',
        'transparency',
        'background_color_rgba',
        'background_color_hex',
        'event_animation',
        'event_round',
    ];

}
