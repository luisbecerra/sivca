<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipoComunicacionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('equipo_comunicacion', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_ambulancia');
			$table->string('tipo',10);
			$table->string('descripcion');
			$table->string('numero_ce');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('equipo_comunicacion');
	}

}
