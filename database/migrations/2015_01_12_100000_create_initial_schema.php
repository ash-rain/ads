 <?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInitialSchema extends Migration {

	public function up()
	{
		Schema::create('publishers', function($table)
		{
			$table->increments('id');
			$table->string('email');
			$table->bigInteger('client_id');
			$table->timestamps();
		});

		Schema::create('ad_units', function($table)
		{
			$table->bigIncrements('id');
			$table->integer('width')->unsigned();
			$table->integer('height')->unsigned();
			$table->bigInteger('slot');
			$table->integer('publisher_id')->unsigned();
			//$table->foreign('publisher_id')->references('id')->on('publishers');
			$table->timestamps();
		});

		Schema::create('access', function($table)
		{
			$table->bigIncrements('id');
			$table->string('token', 32);
			$table->string('domain')->nullable();
			$table->bigInteger('ad_unit_id')->unsigned();
			//$table->foreign('ad_unit_id')->references('id')->on('ad_units');
		});
	}

	public function down()
	{
		Schema::dropIfExists('ad_units');
		Schema::dropIfExists('publishers');
		Schema::dropIfExists('access');
	}

}
