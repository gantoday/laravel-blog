<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	protected $fillable = ['name', 'slug', 'parent_id'];

	public function articles() {
		return $this -> hasMany('App\Article');
	}
	
	public function setSlugAttribute($data)
	{
		$this->attributes['slug']=str_slug($data);
	}

	public function scopeGetTopLevel($query)
	{
		return $query->where('parent_id', 0)->get();
	}

	public function scopeFindBySlug($query, $slug)
	{
		return $query->whereSlug($slug)->firstOrFail();
	}

	public static function getLeveledCategories()
	{
		$expire =  setting('expire');

		return \Cache::tags('categories')->remember('leveled_categories', $expire, function()
		{
			$categories = Category::all();
			$result = array();
			foreach ($categories as $category) {
				if ( $category->parent_id == 0 ) {
					$result['top'][] = $category;
					foreach ($categories as $scategory) {
						if ($scategory->parent_id == $category->id) {
							$result['second'][$category->id][] = $scategory;
						}
					}
				}
			}
			return $result;
		});
	}

	public static function getSortedCategories()
	{
		$expire =  setting('expire');
		
		return \Cache::tags('categories')->remember('sorted_categories', $expire, function()
		{
			$categories = Category::all();
			$result = array();
			foreach ($categories as $category) {
				if ( $category->parent_id == 0 ) {
					$result[] = $category;
					foreach ($categories as $scategory) {
						if ($scategory->parent_id == $category->id) {
							$result[] = $scategory;
						}
					}
				}
			}
			return $result;
		});
	}
}
