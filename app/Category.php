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

    public static function allLevelUp()
    {
        return \Cache::remember('leveled_categories', 1, function()
        {
            $categories = Category::all();
            $result = array();
            foreach ($categories as $key => $category) {
                if ( $category->parent_id == 0 ) {
                    $result[$category->id] = $category;
                    foreach ($categories as $skey => $scategory) {
                        if ($scategory->parent_id == $category->id) {
                            $result[$category->id][] = $scategory;
                        }
                    }
                }
            }
            return $result;
        });
    }
}
