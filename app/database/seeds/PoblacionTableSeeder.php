<?php 

class PoblacionTableSeeder extends Seeder {

    public function run()
    {
        DB::table('poblacion')->delete();

        $poblacion=[
        	['id' => 1, 'desc_poblacion' => 'Cabecera','i_total' => 1000],
        	['id' => 2, 'desc_poblacion' => 'Rural','i_total' => 1000]
        ];

        DB::table('poblacion')->insert($poblacion);
    }

}

?>
