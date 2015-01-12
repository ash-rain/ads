<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model {

	public function adunits()
	{
		return $this->hasMany('App\AdUnit');
	}

}