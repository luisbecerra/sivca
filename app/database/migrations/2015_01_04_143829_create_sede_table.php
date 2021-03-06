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
			$table->increments('id');
			$table->string('nombre');//nombre sede
			$table->string('ips_id');
			$table->string('lugar_id');
			$table->string('direccion');
			$table->bigInteger('telefono')->unsigned();
			$table->string('coordinador')->unsigned();
			$table->unique(array('nombre', 'ips_id'));
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
