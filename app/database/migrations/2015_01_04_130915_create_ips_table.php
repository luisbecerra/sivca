<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIpsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ips', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre')->unique();//nombre de la ips
			$table->string('conformacion',7);
			$table->string('caracter',15);
			$table->string('nivel');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ips');
	}

}
