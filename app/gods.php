<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class gods extends Model {

    protected $table = 'gods';

    public static $rules = [
        'name' => 'required',
        'description' => 'required'
    ];
    protected $fillable = ['name', 'description', 'image', 'tier', 'slug'];

    public function guides()
    {
        return $this->hasMany('App\guides');
    }
    public function Recs()
    {
        return $this->hasMany('App\Recs');
    }
    public function videos()
    {
        return $this->hasMany('App\videos');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
