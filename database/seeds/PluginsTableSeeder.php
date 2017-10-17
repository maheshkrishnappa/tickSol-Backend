<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PluginsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $plugins = ['Ad Block', 'Video Downloader', 'Reporting', 'JSON extension', 'React Detect'];
        $pluginName = $faker->randomElement($plugins);
        $high = count($plugins);

        foreach (range(1,$high) as $index)
        {
            DB::table('plugins')->insert([
                'name' => $pluginName,
                'is_enabled' => $faker->boolean
            ]);
        }
    }
}
