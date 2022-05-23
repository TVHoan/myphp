<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Access;
use Illuminate\Support\Facades\DB;
class AccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accesses')->insert(
       [
           'name'=> "Admin"
       ]     
       );
       DB::table('accesses')->insert(
        [
            'name'=> "Portal"
        ]     
        );

        
    }
}
