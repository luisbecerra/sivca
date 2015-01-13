<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripulacionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tripulacion', function(Blueprint $table)
		{
			$table->integer('id');//cédula de la tripulación;
			$table->primary('id');
			$table->string('nombre');
			$table->string('cargo');
			$table->integer('ambulancia_id');//código asignado por el cruet
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
		Schema::drop('tripulacion');
	}

}
