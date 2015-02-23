<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model {

	//public $timestamps= false;

	public function scopeGetValue($query, $name)
	{
		return $query->whereName($name)->firstOrFail();
	}

	public static function getSettingsArr()
	{
		return \Cache::remember('settings_array',1 , function()
		{
			/*$aa=\App\Setting::all();
			$settings=array();
			foreach($aa as $setting)
			{
				$settings[$setting->name]=$setting->value;
			}*/
			$settings=\App\Setting::all()->lists('value', 'name');

			return $settings;
		});
	}

	public static function getSettingValue($name)
	{
		/*return \Cache::remember('setting_'.$name.'_value',1 , function() use($name)
		{
			$setting=\App\Setting::whereName($name)->first();

			return $setting->value;
		});*/

		$settings=self::getSettingsArr();

		return $settings[$name];
	}

}
