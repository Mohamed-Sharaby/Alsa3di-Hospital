<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class AddDeliveryCostToSetting extends Seeder
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
                'name' => 'delivery_cost',
                'title' => 'سعر التوصيل',
                'type' => 'number',
                'ar_value' => 0,
                'en_value' => 0,
                'page' => 'إعدادات عامة'
            ],
        ]);
    }
}
