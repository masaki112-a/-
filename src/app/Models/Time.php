<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function rests(){
    return $this->hasMany('App\Model\rest');
}
    public function users(){
    return $this->hasMany('App\Model\user');
}
}
