<?php 

class IpsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('ips')->delete();

        $ips = array(
		  array("id"=>1,"nombre"=>"HOSPITAL SAN FRANCISCO E.S.E","conformacion"=>"Pública","caracter"=>"Municipal","nivel"=>1,"created_at"=>"2015-01-08 19:20:42","updated_at"=>"2015-01-08 19:20:42")
		);
 
        DB::table('ips')->insert($ips);

        //seed para la sede principal de la ips
        DB::table('sede')->delete();

        $sedes = array(
		  array("id"=>1,"nombre"=>"UNICA","ips_id"=>1,"lugar_id"=>89,"direccion"=>"Avda 8 No 24-01","telefono"=>2620670,"coordinador"=>"Prueba")
		);
 
        DB::table('sede')->insert($sedes);

        //seed para los servicios de la sede
        DB::table('sede_servicio')->delete();

        $sedesServicio = array(
		  array("sede_id"=>1,"servicio_id"=>1,"tipo_capacidad"=>"Camas","capacidad"=>16),
		  array("sede_id"=>1,"servicio_id"=>2,"tipo_capacidad"=>"Camas","capacidad"=>16),
		  array("sede_id"=>1,"servicio_id"=>3,"tipo_capacidad"=>"Camas","capacidad"=>2),
		  array("sede_id"=>1,"servicio_id"=>12,"tipo_capacidad"=>"Camas","capacidad"=>1)
		);
 
        DB::table('sede_servicio')->insert($sedesServicio);
    }

}

?>
