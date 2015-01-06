<?php 

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        $users = [
            [ 'id' => 1, 'username' => 'felipe', 'password' => Hash::make('felipe'), 'role' => 1, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s") ],
            [ 'id' => 2, 'username' => 'jonathan', 'password' => Hash::make('jonathan'), 'role' => 1, 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s") ]
        ];
 
        DB::table('users')->insert($users);
    }

}

?>
