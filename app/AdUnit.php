<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AdUnit extends Model
{

	public function publisher()
	{
		return $this->belongsTo('App\Publisher');
	}

	public function access()
	{
		return $this->belongsTo('App\Access');
	}

}