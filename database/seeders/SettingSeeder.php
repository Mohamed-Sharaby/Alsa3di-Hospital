<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
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
                'name' => 'phone',
                'title' => 'الجوال',
                'type' => 'number',
                'ar_value' => '9665000000',
                'en_value' => '9665000000',
                'page' => 'إعدادات عامة'
            ],
            [
                'name' => 'email',
                'title' => 'البريد الالكترونى',
                'type' => 'email',
                'ar_value' => 'info@saedi.com',
                'en_value' => 'info@saedi.com',
                'page' => 'إعدادات عامة'
            ],
            [
                'name' => 'address',
                'title' => 'العنوان',
                'type' => 'map',
                'ar_value' => 'Qassim',
                'en_value' => 'Qassim',
                'page' => 'إعدادات عامة'
            ],
            [
                'name' => 'lat',
                'title' => 'خط الطول',
                'type' => 'map',
                'ar_value' => '13.55555',
                'en_value' => '13.55555',
                'page' => 'إعدادات عامة'
            ],
            [
                'name' => 'lng',
                'title' => 'خط العرض',
                'type' => 'map',
                'ar_value' => '14.5655555',
                'en_value' => '14.5666666',
                'page' => 'إعدادات عامة'
            ],
            [
                'name' => 'terms',
                'title' => 'الشروط والاحكام',
                'type' => 'textarea',
                'ar_value' => 'terms in ar',
                'en_value' => 'terms in en',
                'page' => 'الصفحات الثابتة'
            ],
            [
                'name' => 'privacy',
                'title' => 'الخصوصية',
                'type' => 'textarea',
                'ar_value' => 'privacy in ar',
                'en_value' => 'privacy in en',
                'page' => 'الصفحات الثابتة'
            ],
            [
                'name' => 'facebook',
                'title' => 'رابط الفيس بوك',
                'type' => 'url',
                'ar_value' => 'http://fb.com',
                'en_value' => 'http://fb.com',
                'page' => 'حسابات التواصل الاجتماعي'
            ],
            [
                'name' => 'instagram',
                'title' => 'رابط الانستجرام',
                'type' => 'url',
                'ar_value' => 'http://instagram.com',
                'en_value' => 'http://instagram.com',
                'page' => 'حسابات التواصل الاجتماعي'
            ],
            [
                'name' => 'twitter',
                'title' => 'رابط تويتر',
                'type' => 'url',
                'ar_value' => 'http://twitter.com',
                'en_value' => 'http://twitter.com',
                'page' => 'حسابات التواصل الاجتماعي'
            ],
            [
                'name' => 'snapchat',
                'title' => 'رابط سناب شات',
                'type' => 'url',
                'ar_value' => 'http://snapchat.com',
                'en_value' => 'http://snapchat.com',
                'page' => 'حسابات التواصل الاجتماعي'
            ],
            [
                'name' => 'youtube',
                'title' => 'رابط يوتيوب',
                'type' => 'url',
                'ar_value' => 'http://youtube.com',
                'en_value' => 'http://youtube.com',
                'page' => 'حسابات التواصل الاجتماعي'
            ],
            [
                'name' => 'google_play',
                'title' => 'رايط جدجل بلاي',
                'type' => 'url',
                'ar_value' => 'http://googleplay.com',
                'en_value' => 'http://googleplay.com',
                'page' => 'حسابات التواصل الاجتماعي'
            ],
            [
                'name' => 'app_store',
                'title' => 'رابط ابل ستور',
                'type' => 'url',
                'ar_value' => 'http://apple.com',
                'en_value' => 'http://apple.com',
                'page' => 'حسابات التواصل الاجتماعي'
            ],
            [
                'name' => 'about_video',
                'title' => 'فيديو ',
                'type' => 'file',
                'ar_value' => '',
                'en_value' => '',
                'page' => 'إعدادات عامة'
            ],
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
