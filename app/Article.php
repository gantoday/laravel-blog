<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model {

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $appends = ['tag_list', 'body_html', 'timeDiffForHumans'];

	protected $fillable = ['title', 'body', 'slug', 'click', 'user_id', 'category_id', 'original'];

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

	public function getBodyHtmlAttribute()
	{
		$Parsedown = new \Parsedown();

		return $Parsedown->text($this->body);
	}

	public function getTimeDiffForHumansAttribute()
	{
		return $this->created_at->diffForHumans();
	}

	public function setSlugAttribute($data)
	{
		$this->attributes['slug']=str_slug($data);
	}

	public function scopeFindBySlug($query, $slug)
	{
		return $query->whereSlug($slug)->firstOrFail();
	}


}
