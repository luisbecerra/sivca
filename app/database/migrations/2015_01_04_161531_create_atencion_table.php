<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtencionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('atencion', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('ambulancia_id');
			$table->integer('paciente_id');
			$table->integer('sede_id');
			$table->string('tipo');
			$table->text('motivo');
			$table->timestamp('f_solicitud');//hora y fecha de solicitud del servicio
			$table->timestamp('f_atencion');//hora y fecha de llegada al lugar de emergencia
			$table->timestamp('f_inicio_traslado');
			$table->timestamp('f_fin_traslado');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('atencion');
	}

}
