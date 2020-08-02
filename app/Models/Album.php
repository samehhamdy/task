<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = ['name','type'];

    public function photos(){
        return $this->hasMany('App\Models\Photo');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
