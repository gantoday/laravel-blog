<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

	protected $fillable = ['name', 'slug'];

	public function articles()
	{
		return $this->belongsToMany('App\Article');
	}

    public function setSlugAttribute($data)
    {
        $this->attributes['slug']=str_slug($data);
    }


}
