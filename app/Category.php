<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name_ar',
        'name_en',
    ];


    public function positions()
    {
        return $this->hasMany(Position::class);
    }
    public function getNameAttribute()
    {
        return app()->isLocale('en') ? $this->name_en : $this->name_ar;
    }
}
