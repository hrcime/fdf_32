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

    public function scopeFilter($query, $input = [])
    {
        //Filter by category
        if (!empty($input['category'])) {
            $query->where('category_id', $input['category']);
        }

        //Filter by keyword
        if (!empty($input['name'])) {
            $query->where('name', 'LIKE', '%' . $input['name'] . '%');
        }

        //Filter by point
        if (!empty($input['avg_point'])) {
            $query->where('avg_point', '>=', $input['avg_point']);
        }

        //Filter by price - from
        if (!empty($input['from'])) {
            $query->where('price', '>=', $input['from']);
        }

        //Filter by price - to
        if (!empty($input['to'])) {
            $query->where('price', '<=', $input['to']);
        }

        return $query;
    }
}
