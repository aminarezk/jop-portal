<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = [
        'title_ar',
        'title_en',
        'description_ar',
        'description_en',
        'salary',
        'location',
        'user_id',
        'category_id',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }


    public function getTitleAttribute()
    {
        return app()->isLocale('en') ? $this->title_en : $this->title_ar;
    }

    public function getDescriptionAttribute()
    {
        return app()->isLocale('en')
            ? $this->description_en
            : $this->description_ar;
    }
}
