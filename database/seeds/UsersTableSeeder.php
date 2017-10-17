<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1,10) as $index)
        {
            DB::table('users_ticksols')->insert([
                'name' => $faker->unique()->userName,
                'password' => $faker->password,
                'email' => $faker->unique()->email,
                'is_admin' => $faker->boolean
            ]);
        }
    }
}
