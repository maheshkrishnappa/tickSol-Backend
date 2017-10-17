<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\UsersTicksol as Users;
use App\Plugin as Plugins;

class PluginUserSeeder extends Seeder
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
        $plugins = Plugins::all()->pluck('id')->toArray();
        foreach (range(1, 10) as $index)
        {
            DB::table('plugin_user')->insert([
                'user_id' => $faker->randomElement($users),
                'plugin_id' => $faker->randomElement($plugins)
            ]);
        }
    }
}
