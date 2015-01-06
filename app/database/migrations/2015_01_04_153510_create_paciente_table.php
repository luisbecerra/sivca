<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacienteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('paciente', function(Blueprint $table)
		{
			$table->bigInteger('id')->unique();
			$table->primary('id');
			$table->string('tipo_id');//cedula,tarjeta o nuip
			$table->string('nombre');
			$table->date('f_nacimiento');
			$table->string('genero',9);
			$table->string('direccion');
			$table->string('regimen');
			$table->integer('lugar_id');//barrio en el que esta ubicado
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
		Schema::drop('paciente');
	}

}
