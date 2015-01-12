<?php namespace App;

class AccessObserver
{

    public function saving($model)
    {
    	$this->makeToken($model);
    }

    public function updating($model)
    {
    	$this->makeToken($model);
    }

    private function makeToken($model)
    {
    	if($model->token == null)
    		$model->token = md5(microtime());
    }

    // creating, created, updating, updated
    // saving, saved, deleting, deleted, restoring, restored

}