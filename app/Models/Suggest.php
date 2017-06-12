<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suggest extends Model
{
    protected $fillable = [
        'title',
        'image',
        'content',
        'status',
        'user_id',
        'category_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeInfo($query)
    {
        return $query->with('user', 'category');
    }

    public function getImageAttribute($value)
    {
        if (!empty($value)) {
            return config('settings.path_suggest') . '/' . $value;
        }
    }
}
