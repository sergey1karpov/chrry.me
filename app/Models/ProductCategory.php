<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $table = 'product_categories';

    protected $fillable = ['user_id', 'name', 'position', 'slug'];

    const DEFAULT_CATEGORY = 'Все товары';
    const DEFAULT_CATEGORY_SLUG = 'all';

    public function products()
    {
        return $this->hasMany(Product::class, 'product_categories_id', 'id');
    }
}
