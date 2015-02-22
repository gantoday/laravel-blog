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
		//$expires =  self::getValue('expires');

		return \Cache::remember('settings_array',1 , function()
		{
			$aa=\App\Setting::all();
			$settings=array();
			foreach($aa as $setting)
			{
				$settings[$setting->name]=$setting->value;
			}
			return $settings;
		});
	}

}
