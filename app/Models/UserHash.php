<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHash extends Model
{
    use HasFactory;

    protected $table = 'user_hash';

    protected $fillable = ['user_id', 'hash'];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
