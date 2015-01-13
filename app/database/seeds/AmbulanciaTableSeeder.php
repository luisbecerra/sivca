<?php 

class AmbulanciaTableSeeder extends Seeder {

    public function run()
    {
        DB::table('ambulancia')->delete();
        

        $ambulancias = array(
		  array("id"=>123654,"num_tpropiedad"=>13245654,"tipo"=>"Furgoneta","placa"=>"HJK226","marca"=>"CHEVROLET","dir_ambulancia"=>"CALLE FALSA 123","modelo"=>1995,"f_venc_seguro"=>"2015-01-31","f_venc_soat"=>"2015-01-31","num_poliza"=>23156454,"f_vig_poliza"=>"2015-01-01","f_venc_poliza"=>"2014-12-17","f_rev_tecmecanica"=>"2014-12-17","created_at"=>"2015-01-08 13:10:05","updated_at"=>"2015-01-08 13:10:05")
		);
 
        DB::table('ambulancia')->insert($ambulancias);

        //imágenes de la ambulancia
        DB::table('img_ambulancia')->delete();

        $img_ambulancias = array(
		  array("id"=>1,"ambulancia_id"=>123654,"url"=>"AmbulanciasImg/1.jpg"),
		  array("id"=>3,"ambulancia_id"=>123654,"url"=>"AmbulanciasImg/3.jpg"),
		  array("id"=>4,"ambulancia_id"=>123654,"url"=>"AmbulanciasImg/4.jpg"),
		  array("id"=>2,"ambulancia_id"=>123654,"url"=>"AmbulanciasImg/2.jpg")
		);
 
        DB::table('img_ambulancia')->insert($img_ambulancias);
    }

}

?>
