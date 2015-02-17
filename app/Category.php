<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	protected $fillable = ['name', 'slug'];

    public function articles() {
		return $this -> hasMany('App\Article');
	}
    
    public function setSlugAttribute($data)
    {
        $this->attributes['slug']=str_slug($data);
    }
}
