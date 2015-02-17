<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

	protected $fillable = ['name', 'slug'];

	public function setSlugAttribute($data)
	{
            $this->attributes['slug']=mb_strtolower($data);
	}

	public function articles()
	{
		return $this->belongToMany('App\Article');
	}


}
