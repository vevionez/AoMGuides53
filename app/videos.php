<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class videos extends Model
{
    protected $table = 'videos';


    protected $fillable = ['name', 'gods_id', 'description', 'image', 'author', 'slug'];


    public function gods()
    {
        return $this->belongsTo('App\gods');
    }

    public function videos()
    {
        return $this->hasMany('App\Recs');
    }
}
