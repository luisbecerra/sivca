<?php 

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        $users = [
            [ 'id' => 1, 'username' => 'admin', 'password' => Hash::make('admin'), 'role' => 1, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 2, 'username' => 'rotacion', 'password' => Hash::make('rotaciones'), 'role' => 2, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 3, 'username' => 'atencion', 'password' => Hash::make('atenciones'), 'role' => 3, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s") ]
        ];
 
        DB::table('users')->insert($users);
    }

}

?>
