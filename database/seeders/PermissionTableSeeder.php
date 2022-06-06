<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Admin::whereName('Super Admin')->whereEmail('admin@admin.com')->first();

        $permissions = [
            'Admins',
            'Roles',
            'Users',
            'Branches',
            'Specializations',
            'Services',
            'Doctors',
            'Sliders',
            'Contacts',
            'News',
            'Reservations',
            'Settings',
            'Categories',
            'Products',
            'Coupons',
            'Carts',
            'Offers',
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate(['name' => $permission],['name' => $permission, 'guard_name' => 'admin']);
        }

        $role = Role::updateOrCreate(['name'=> 'Super Admin'],['name' => 'Super Admin', 'guard_name' => 'admin']);
        $role->syncPermissions($permissions);
        $user->assignRole('Super Admin');
    }
}
