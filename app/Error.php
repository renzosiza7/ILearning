<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Error extends Model
{
    protected $fillable = ['user_id', 'description'];

    //one error belongs to one user
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    //one error has many solutions
    public function solutions()
    {
        return $this->hasMany('App\Solution');
    }
}
