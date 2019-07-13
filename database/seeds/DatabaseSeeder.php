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
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
     //   $this->call(RolesTableSeeder::class);
     //   $this->call(RolesPermissionsTableSeeder::class);
     //   $this->call(ModelHasRolesTableSeeder::class);
     //   $this->call(ClientTableSeeder::class);
     //   $this->call(ClientUserTableSeeder::class);
     //   $this->call(EventTableSeeder::class);
      //  $this->call(ResultTableSeeder::class);
    }
}
