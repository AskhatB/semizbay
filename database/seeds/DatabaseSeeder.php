<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->insert([
    		'l_name'=>'Исламгалиев',
    		'f_name'=>'Данияр',
    		'pat_name'=> 'Ауесханович',
    		'iin' => '970408111111',
    		'position' => 'Программист',]);
        // $this->call(UsersTableSeeder::class);
    	}
    }
