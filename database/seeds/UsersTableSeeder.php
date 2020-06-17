<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) { 
        	\Illuminate\Support\Facades\DB::table('users')->insert([
        		'name' => "JhonDoe$i",
        		'surname' => "test",
        		"gender" => "f",
        		"birth" => "2020-07-07",
        		"address" => "test",
        		"city" => "test",
        		"pc" => "73000",
        		"phone" => "0612345678",
        		"status" => 3,
        		"email" => "john$i@doe.fr",
        		"password" => bcrypt('0000')
        	]);
        }
    }
}
