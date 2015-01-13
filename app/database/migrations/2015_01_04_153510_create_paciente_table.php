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
			$table->bigInteger('id')->unique()->unsigned();
			$table->primary('id');
			$table->string('tipo_id',4);//cedula,tarjeta o nuip
			$table->string('nombre');
			$table->date('f_nacimiento');
			$table->string('genero',1);
			$table->string('direccion');
			$table->string('regimen');
			$table->integer('lugar_id');//barrio en el que esta ubicado
			$table->integer('eps_id')->nullable();
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
