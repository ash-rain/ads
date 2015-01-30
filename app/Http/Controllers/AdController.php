<?php namespace App\Http\Controllers;

use App\Access;
use \Response;
use \View;

class AdController extends Controller
{
	public function getIndex($token)
	{
		$access = Access::where('token', '=', $token)->firstOrFail();

		if(!$access->check())
			return Response::make('Access denied', 403);
		if($access->ad == null)
			return Response::make('Server fault', 500);

		return View::make('adsense')->withAd($access->ad);
	}
}