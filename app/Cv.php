<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    protected $fillable = [
        'file_path',
        'user_id',

    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
