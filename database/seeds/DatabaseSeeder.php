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
         $this->call(PluginsTableSeeder::class);
         $this->call(TicketsTableSeeder::class);

         $this->call(VenuesTableSeeder::class);
         $this->call(EventsTableSeeder::class);
         $this->call(BookingsTableSeeder::class);
         $this->call(SettingsTableSeeder::class);
         $this->call(PluginUserSeeder::class);
         $this->call(BookingTicketSeeder::class);
         $this->call(EventVenueSeeder::class);
    }
}
