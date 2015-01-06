<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSedeServicioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sede_servicio', function(Blueprint $table)
		{
			$table->integer('sede_id')->unsigned();
			$table->integer('servicio_id')->unsigned();
			$table->string('tipo_capacidad');
			$table->integer('capacidad')->unsigned();
			$table->primary(array('sede_id', 'servicio_id','tipo_capacidad'));
		});
		
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sede_servicio');
	}

}
