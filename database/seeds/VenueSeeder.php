<?php


use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class VenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,7) as $index)
        {
            DB::table('venues')->insert([
                'name' => $faker->company,
                'address' => $faker->address,
                'capacity' => $faker->numberBetween($min = 10, $max = 1000)
            ]);
        }
    }
}
