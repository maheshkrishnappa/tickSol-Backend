<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Booking as Bookings;
use App\Ticket as Tickets;

class BookingTicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $bookings = Bookings::all()->pluck('id')->toArray();
        $tickets = Tickets::all()->pluck('id')->toArray();

        foreach (range(1, 10) as $index)
        {
            DB::table('booking_ticket')->insert([
                'quantity' => $faker->numberBetween(1, 9),
                'booking_id' => $faker->randomElement($bookings),
                'ticket_id' => $faker->randomElement($tickets)
            ]);
        }
    }
}
