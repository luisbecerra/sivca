<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurnoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('turno', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('ambulancia_id');
			$table->time('h_inicio');
			$table->time('h_fin');
			$table->date('dia_inicio');
			$table->date('dia_fin');
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
		Schema::drop('turno');
	}

}
