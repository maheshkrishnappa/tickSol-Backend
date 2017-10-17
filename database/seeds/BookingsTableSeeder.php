<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\UsersTicksol as Users;
use App\Venue as Venues;
use App\Event as Events;

class BookingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $users = Users::all()->pluck('id')->toArray();
        $venues = Venues::all()->pluck('id')->toArray();
        $events = Events::all()->pluck('id')->toArray();

        foreach (range(1, 10) as $index)
        {
            DB::table('bookings')->insert([
                'amount' => $faker->randomFloat(2, 5, 1000),
                'booking_date' => $faker->date(),
                'user_id' => $faker->randomElement($users),
                'venue_id' => $faker->randomElement($venues),
                'event_id' => $faker->randomElement($events)
            ]);
        }
    }
}
