<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    protected $fillable = ['error_id', 'description'];

    //one solution belongs to one error
    public function error()
    {
        return $this->belongsTo('App\Error');
    }

    //one solution has many links
    public function links()
    {
        return $this->hasMany('App\Link');
    }
}
