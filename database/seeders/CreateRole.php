<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateRole extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // manage booking
        Permission::create(['name' => 'manage booking']);
        Permission::create(['name' => 'create booking']);
        Permission::create(['name' => 'edit booking']);
        Permission::create(['name' => 'delete booking']);

        // manage user
        Permission::create(['name' => 'manage user']);
        Permission::create(['name' => 'add user']);
        Permission::create(['name' => 'update user']);
        Permission::create(['name' => 'delete user']);

        $student = Role::create(['name' => 'student']);
        $student->givePermissionTo('manage booking');
        $student->givePermissionTo('create booking');
        $student->givePermissionTo('edit booking');
        $student->givePermissionTo('delete booking');

        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo('manage booking');
        $admin->givePermissionTo('create booking');
        $admin->givePermissionTo('edit booking');
        $admin->givePermissionTo('delete booking');

        $admin->givePermissionTo('manage user');
        $admin->givePermissionTo('add user');
        $admin->givePermissionTo('update user');
        $admin->givePermissionTo('delete user');


    }
}
