<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category' => 'Lifetime',
            'type' => 'MEM',
            'active' => 1,
            'created_at' => new DateTime,
        ]);         

        DB::table('categories')->insert([
            'category' => 'Annual',
            'type' => 'MEM',
            'active' => 1,
            'created_at' => new DateTime,
        ]);         

        DB::table('categories')->insert([
            'category' => 'Half Yearly',
            'type' => 'MEM',
            'active' => 1,
            'created_at' => new DateTime,
        ]);         

        DB::table('categories')->insert([
            'category' => 'Dinner',
            'type' => 'EVT',
            'active' => 1,
            'created_at' => new DateTime,
        ]);

        DB::table('categories')->insert([
            'category' => 'Wine Tasting',
            'type' => 'EVT',
            'active' => 1,
            'created_at' => new DateTime,
        ]);



        DB::table('categories')->insert([
            'category' => 'AGM',
            'type' => 'EVT',
            'active' => 1,
            'created_at' => new DateTime,
        ]);


    }
}
