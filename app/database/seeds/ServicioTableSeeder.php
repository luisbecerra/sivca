<?php 

class ServicioTableSeeder extends Seeder {

    public function run()
    {
        DB::table('servicio')->delete();

        $servicios = array(
		  array("id"=>"Pediátrica"),
		  array("id"=>"Adultos"),
		  array("id"=>"Obstetricia"),
		  array("id"=>"Cuidado Intermedio Neonatal"),
		  array("id"=>"Cuidado Intensivo Neonatal"),
		  array("id"=>"Cuidado Intermedio Pediátrico"),
		  array("id"=>"Cuidado Intensivo Pediátrico"),
		  array("id"=>"Cuidado Intermedio Adulto"),
		  array("id"=>"Cuidado Intensivo Adulto"),
		  array("id"=>"Psiquiatría"),
		  array("id"=>"Quirófano"),
		  array("id"=>"Partos")
		);
 
        DB::table('servicio')->insert($servicios);
    }

}

?>
