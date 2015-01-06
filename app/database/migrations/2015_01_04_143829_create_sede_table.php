<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSedeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sede', function(Blueprint $table)
		{
			$table->string('id')->unique();//nombre sede
			$table->string('ips_id');
			$table->string('direccion');
			$table->bigInteger('telefono')->unsigned();
			$table->string('coordinador')->unsigned();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sede');
	}

}
