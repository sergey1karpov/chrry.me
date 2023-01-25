<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventSetting extends Model
{
    use HasFactory;

    protected $table = 'event_settings';

    protected $fillable = ['user_id', 'close_card_type', 'open_card_type'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
