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

        $student = Role::create(['name' => 'student']);
        $student->givePermissionTo('manage booking');
        $student->givePermissionTo('create booking');
        $student->givePermissionTo('edit booking');
        $student->givePermissionTo('delete booking');


    }
}