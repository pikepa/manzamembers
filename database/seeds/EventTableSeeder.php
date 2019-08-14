<?php

use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Populate events
        factory(App\Event::class, 8)->create();

        // Get all the roles attaching up to 3 random roles to each user
        $categories = App\Category::where('type','EVT')->get();

        // Populate the pivot table
        App\Event::all()->each(function ($event) use ($categories) { 
            $event->categories()->attach(
                $categories->random(rand(1, 3))->pluck('id')->toArray()
            ); 
        });
    }
}
