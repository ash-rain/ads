 <?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInitialSchema extends Migration {

	public function up()
	{
		Schema::create('ad_units', function($table)
		{
			$table->increments('id');
			$table->integer('width');
			$table->integer('height');
			$table->integer('slot');
			$table->integer('publisher_id');
			$table->timestamps();
		});

		Schema::create('publishers', function($table)
		{
			$table->increments('id');
			$table->string('name');
			$table->integer('client');
			$table->timestamps();
		});

		Schema::create('access', function($table)
		{
			$table->increments('id');
			$table->string('token', 32);
			$table->string('domain')->nullable();
			$table->integer('ad_id');
		});
	}

	public function down()
	{
		Schema::dropIfExists('ad_units');
		Schema::dropIfExists('publishers');
		Schema::dropIfExists('access');
	}

}
