<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLugarTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lugar', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre');//nombre lugar
			$table->tinyInteger('tipo');//1 departamento,2 municipio,3 comuna/localidad,4 barrio,5 corregimiento,6 veredas,7 inspeccion
			$table->tinyInteger('urbano')->nullable();//1 si, 0 no
			$table->integer('lugar_id')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('lugar');
	}

}