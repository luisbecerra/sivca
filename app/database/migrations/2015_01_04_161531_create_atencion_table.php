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
			$table->integer('id_ambulancia');
			$table->integer('id_paciente');
			$table->integer('id_ips');
			$table->integer('tipo');
			$table->timestamp('f_solicitud');//hora y fecha de solicitud del servicio
			$table->timestamp('f_atencion');//hora y fecha de llegada al lugar de emergencia
			$table->timestamp('f_llegada');//hora y fecha de llegada a la ips
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
