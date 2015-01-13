<?php 

class EpsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('eps')->delete();

        $eps = array(
		  array("id"=>1,"nombre"=>"NUEVA EPS")
		);
 
        DB::table('eps')->insert($eps);
    }
}

?>
