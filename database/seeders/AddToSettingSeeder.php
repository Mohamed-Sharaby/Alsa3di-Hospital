<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class AddToSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::insert([
            [
                'name' => 'about_image',
                'title' => 'صورة من نحن',
                'type' => 'file',
                'ar_value' => '',
                'en_value' => '',
                'page' => 'إعدادات عامة'
            ],
        ]);
    }
}
