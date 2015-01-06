<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmbulanciaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ambulancia', function(Blueprint $table)
		{
			$table->integer('id');//código asignado por el cruet
			$table->primary('id');
			$table->bigInteger('num_tpropiedad'); //numero de tarjeta de propiedad
			$table->string('tipo',10);
			$table->string('placa',6);
			$table->string('marca');
			$table->string('dir_ambulancia');
			$table->integer('modelo')->unsigned();
			$table->date('f_venc_seguro')->unsigned();
			$table->date('f_venc_soat')->unsigned();
			$table->integer('num_poliza')->unsigned();
			$table->date('f_vig_poliza')->unsigned();
			$table->date('f_poliza_poliza')->unsigned();
			$table->date('f_rev_tecmecanica')->unsigned();
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
		Schema::drop('ambulancia');
	}

}
