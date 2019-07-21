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
            'category' => 'Ordinary',
            'type' => 'MEM',
            'active' => 1,
            'created_at' => new DateTime,
        ]);         

        DB::table('categories')->insert([
            'category' => 'Associate',
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


        DB::table('categories')->insert([
            'category' => 'Family',
            'type' => 'PRI',
            'active' => 1,
            'created_at' => new DateTime,
        ]);

        DB::table('categories')->insert([
            'category' => 'Family - Non Members',
            'type' => 'PRI',
            'active' => 1,
            'created_at' => new DateTime,
        ]);         

        DB::table('categories')->insert([
            'category' => 'Single Adult',
            'type' => 'PRI',
            'active' => 1,
            'created_at' => new DateTime,
        ]);

        DB::table('categories')->insert([
            'category' => 'Single Adult Member',
            'type' => 'PRI',
            'active' => 1,
            'created_at' => new DateTime,
        ]);

        DB::table('categories')->insert([
            'category' => 'Annual',
            'type' => 'TRM',
            'active' => 1,
            'created_at' => new DateTime,
        ]);

        DB::table('categories')->insert([
            'category' => '1st Half Year',
            'type' => 'TRM',
            'active' => 1,
            'created_at' => new DateTime,
        ]);

        DB::table('categories')->insert([
            'category' => '2nd Half Year',
            'type' => 'TRM',
            'active' => 1,
            'created_at' => new DateTime,
        ]);

        DB::table('categories')->insert([
            'category' => 'Lifetime',
            'type' => 'TRM',
            'active' => 1,
            'created_at' => new DateTime,
        ]);


    }
}
