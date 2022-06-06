<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            AboutSeeder::class,
            AdminSeeder::class,
            PermissionTableSeeder::class,
            UpdatePermissionTableSeeder::class,
            BranchSeeder::class,
            ContactSeeder::class,
            NewsSeeder::class,
            SettingSeeder::class,
            AddToSettingSeeder::class,
            SliderSeeder::class,
            SpecializationSeeder::class,

            AddDeliveryCostToSetting::class
        ]);
    }
}
