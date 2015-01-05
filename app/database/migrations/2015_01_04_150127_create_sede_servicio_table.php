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
			$table->string('id_sede');
			$table->string('id_servicio');
			$table->string('tipo_capacidad');
			$table->integer('capacidad')->unsigned();
		});
		
		DB::statement('ALTER TABLE sede_servicio ADD constraint UQ_sede_servicio UNIQUE( id_sede, id_servicio,tipo_capacidad);');
		
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
