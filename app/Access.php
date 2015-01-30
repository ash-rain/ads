<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Access extends Model
{
	protected $table = 'access';
	public $timestamps = false;

	public static function boot()
	{
		parent::boot();
		Access::observe(new AccessObserver);
	}

	public function ad()
	{
		return $this->hasOne('App\AdUnit', 'id');
	}

	public function check()
	{
		$allow = $this->domain;
		if($allow == null)
			return true;

		$allow = explode(',', $allow);

		$url = Request::header('host');
		if($url == null)
			return false;

		return in_array($url, $allow);
	}

}