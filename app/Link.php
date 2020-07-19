<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = ['solution_id', 'url', 'description'];
    
    //one link belongs to one solution
    public function solution()
    {
        return $this->belongsTo('App\Solution');
    }
}
