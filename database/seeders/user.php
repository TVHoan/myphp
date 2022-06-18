<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'dofybabe@gmail.com',
            'password' => bcrypt('hoanhp97'),
            'access_id'=> 1,
            
        ]);
        DB::table('profiles')->insert([
            'user_id' => 1,
            'country_id'=>1,
            'user_id'=>1,
  
        ]);

     
    }
}
