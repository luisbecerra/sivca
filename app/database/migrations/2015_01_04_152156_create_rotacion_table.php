<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRotacionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rotacion', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('ambulancia_id');
			$table->time('h_inicio');
			$table->time('h_fin');
			$table->date('f_inicio');
			$table->date('f_fin');
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
		Schema::drop('rotacion');
	}

}
