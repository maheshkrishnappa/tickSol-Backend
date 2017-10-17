<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\UsersTicksol as User;

class VenuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $users = User::all()->pluck('id')->toArray();

        foreach (range(1, 10) as $index)
        {
            DB::table('venues')->insert([
                'name' => $faker->company,

                'address_line_1' => $faker->buildingNumber,
                'address_line_2' => $faker->streetAddress,
                'city' => $faker->city,
                'state' => $faker->randomElement(['VIC', 'TAS', 'QLD', 'WA', 'NSW']),
                'postcode' => $faker->postcode,
                'country' => $faker->country,

                'email' => $faker->companyEmail,
                'contact_num' => $faker->phoneNumber,

                'capacity' => $faker->numberBetween(500, 10000),

                'wheelchair_access' => $faker->boolean,
                'parking' => $faker->boolean,
                'trains' => $faker->boolean,
                'trams' => $faker->boolean,
                'busses' => $faker->boolean,
                'taxi_uber' => $faker->boolean,
                'restaurants' => $faker->boolean,
                'pubs' => $faker->boolean,

                'website_url' => $faker->url,

                'user_id' => $faker->randomElement($users)
            ]);
        }
    }
}
