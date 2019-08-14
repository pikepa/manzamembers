<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Peter Pike',
            'email' => 'pikepeter@gmail.com',
            'password' => bcrypt('pap4163'),
            'created_at' => new DateTime,
        ]);    
   
    }
}
