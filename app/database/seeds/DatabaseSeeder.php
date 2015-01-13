<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
		$this->call('ServicioTableSeeder');
		$this->call('LugarTableSeeder');
		$this->call('PoblacionTableSeeder');
		$this->call('AmbulanciaTableSeeder');
		$this->call('IpsTableSeeder');
		$this->call('EpsTableSeeder');
	}

}