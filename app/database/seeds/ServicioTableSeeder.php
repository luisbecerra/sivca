<?php 

class ServicioTableSeeder extends Seeder {

    public function run()
    {
        DB::table('servicio')->delete();

        $servicios = array(
		  array("id"=>1,"nombre"=>"Pediátrica"),
		  array("id"=>2,"nombre"=>"Adultos"),
		  array("id"=>3,"nombre"=>"Obstetricia"),
		  array("id"=>4,"nombre"=>"Cuidado Intermedio Neonatal"),
		  array("id"=>5,"nombre"=>"Cuidado Intensivo Neonatal"),
		  array("id"=>6,"nombre"=>"Cuidado Intermedio Pediátrico"),
		  array("id"=>7,"nombre"=>"Cuidado Intensivo Pediátrico"),
		  array("id"=>8,"nombre"=>"Cuidado Intermedio Adulto"),
		  array("id"=>9,"nombre"=>"Cuidado Intensivo Adulto"),
		  array("id"=>10,"nombre"=>"Psiquiatría"),
		  array("id"=>11,"nombre"=>"Quirófano"),
		  array("id"=>12,"nombre"=>"Partos")
		);
 
        DB::table('servicio')->insert($servicios);
    }

}

?>
