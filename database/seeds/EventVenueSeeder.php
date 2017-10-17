<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Venue as Venues;
use App\Event as Events;

class EventVenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $venues = Venues::all()->pluck('id')->toArray();
        $events = Events::all()->pluck('id')->toArray();

        foreach (range(1, 10) as $index)
        {
            DB::table('event_venue')->insert([
                'conduct_date' => $faker->date(),
                'start_time' => $faker->time(),
                'end_time' => $faker->time(),
                'venue_id' => $faker->randomElement($venues),
                'event_id' => $faker->randomElement($events)
            ]);
        }
    }
}
