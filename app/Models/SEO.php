<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SEO extends Model
{
    use HasFactory;

    protected $table = 'seo_user';

    protected $fillable = ['user_id', 'title', 'description', 'keywords'];
}
