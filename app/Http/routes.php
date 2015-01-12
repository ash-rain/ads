<?php

Route::get('/', function(){ return redirect('/api/v1'); });

Route::get('test/{id?}', function($id = 1){
	if($id < 1) $id = 1;

	$a = App\Access::find($id);

	$request = Request::create('/api/v1/'.$a->token, 'GET', []);
	$html = Route::dispatch($request)->getContent();

	return View::make('test')->withAdhtml($html);
});

Route::group(array('prefix' => 'api/v1'), function()
{
	Route::controller('/{token}', 'AdController');
	Route::controller('stats', 'StatsController');
});