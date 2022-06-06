<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class UpdatePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'Admins'=> 'التعامل مع المديرين',
            'Roles' => 'التعامل مع الصلاحيات والمناصب',
            'Users'=> 'التعامل مع المرضى',
            'Branches'=>'التعامل مع الفروع',
            'Specializations'=>'التعامل مع التخصصات',
            'Services'=>'التعامل مع الخدمات',
            'Doctors'=>'التعامل مع الاطباء',
            'Sliders'=>'التعامل مع السلايدرز',
            'Contacts'=>'التعامل مع رسائل الزوار',
            'News'=>'التعامل مع الاخبار',
            'Reservations'=>'التعامل مع الحجوزات',
            'Settings'=>'التعامل مع الاعدادات',
            'Categories'=>'التعامل مع الاقسام',
            'Products'=>'التعامل مع المنتجات',
            'Coupons'=>'التعامل مع كوبونات الخصم',
            'Carts'=>'التعامل مع الطلبات',
            'Offers'=>'التعامل مع العروض',
        ];

        foreach ($permissions as $key => $permission) {
            Permission::where('name', $key)->update(['ar_name' => $permission]);
        }
    }
}
