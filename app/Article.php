<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

	protected $fillable = ['title', 'body', 'alias', 'click', 'user_id', 'category_id'];

    protected $softDelete = true;
    
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function tags()
    {
    	return $this->belongsToMany('App\Tag');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function getTagListAttribute()
    {
    	return $this->tags->lists('id');
    }
}
