<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\UsersTicksol as Users;

class EventsTableSeeder extends Seeder
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

        foreach (range(1, 10) as $index)
        {
            DB::table('events')->insert([
                'name' => $faker->company,
                'start_date' => $faker->date(),
                'end_date' => $faker->date(),
                'user_id' => $faker->randomElement($users)
            ]);
        }
    }
}
