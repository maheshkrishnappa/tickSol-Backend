<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $categories = ['Adult', 'Child', 'Student', 'Senior', 'Concession'];
        $ticketType = $faker->randomElement($categories);
        $high = count($categories);

        foreach (range(1, $high) as $index)
        {
            DB::table('tickets')->insert([
                'type' => $ticketType,
                'price' => $faker->randomFloat(2, 5, 25)
            ]);
        }
    }
}
