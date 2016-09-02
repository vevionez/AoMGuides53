<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class guides extends Model {

    protected $table = 'guides';


    protected $fillable = ['name', 'gods_id', 'description', 'image', 'author', 'slug'];


    public function gods()
    {
        return $this->belongsTo('App\gods');
    }

    public function Recs()
    {
        return $this->hasMany('App\Recs');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
