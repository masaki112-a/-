<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Rest extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function time(){
    return $this->belongsTo('App\Models\Time');
}

}
