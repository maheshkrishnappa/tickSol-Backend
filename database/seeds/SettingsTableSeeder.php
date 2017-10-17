<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\UsersTicksol as Users;

class SettingsTableSeeder extends Seeder
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
        $themes = ['Grey', 'Black', 'White'];

        foreach (range(1, 10) as $index)
        {
            DB::table('settings')->insert([
                'company_name' => $faker->company,
                'logo_url' => $faker->imageUrl(),
                'theme' => $faker->randomElement($themes),
                'user_id' => $faker->randomElement($users)
            ]);
        }
    }
}
