<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tests')->delete();
        DB::table('tests')->insert(
        	[
        		['id' => 1, 'name' => 'dat', 'email'=>'dat@gmail.com'],
        		['id' => 2, 'name' => 'b', 'email'=>'a@gmail.com'],
        		['id' => 3, 'name' => 'c', 'email'=>'b@gmail.com'],
        		['id' => 4, 'name' => 'd', 'email'=>'c@gmail.com'],
        		['id' => 5, 'name' => 'e', 'email'=>'d@gmail.com'],
	        ]
	    );
    }
}