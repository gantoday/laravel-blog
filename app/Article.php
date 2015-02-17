<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model {

    use SoftDeletes;

    protected $dates = ['deleted_at'];

	protected $fillable = ['title', 'body', 'slug', 'click', 'user_id', 'category_id'];

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

    /*public function getBodyAttribute($value)
    {
        $Parsedown = new \App\Extensions\Parsedown\Parsedown();

        return $Parsedown->text($value);
    }*/

    public function setSlugAttribute($data)
    {
        $this->attributes['slug']=str_slug($data);
    }

    public static function scopeFindBySlug($query, $slug)
    {
        return $query->whereSlug($slug)->firstOrFail();
    }


}
