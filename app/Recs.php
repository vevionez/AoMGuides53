<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Recs extends Model {

    protected $table = 'recs';


    protected $fillable = ['name', 'gods_id', 'description', 'image', 'author', 'slug', 'patch', 'file_path'];


    public function gods()
    {
        return $this->belongsTo('App\gods');
    }

    public function guides()
    {
        return $this->belongsTo('App\gods');
    }

}
