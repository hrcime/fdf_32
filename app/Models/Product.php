<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'image',
        'price',
        'quantity',
        'information',
        'category_id',
        'avg_point',
    ];

    public function rates()
    {
        return $this->hasMany(Rate::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getImageAttribute($value)
    {
        return config('settings.path_product') . '/' . $value;
    }
}
