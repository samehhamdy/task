<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        $admin = \App\Models\User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => \Illuminate\Support\Facades\Hash::make(123456789)
        ]);

        $manager = \App\Models\User::create([
            'name' => 'manager',
            'email' => 'm@m.com',
            'password' => \Illuminate\Support\Facades\Hash::make(123456789)
        ]);

        $user = \App\Models\User::create([
            'name' => 'user',
            'email' => 'u@u.com',
            'password' => \Illuminate\Support\Facades\Hash::make(123456789)
        ]);

        // create permissions
        $index_user = Permission::create(['name' => 'index user']);
        $create_user = Permission::create(['name' => 'create user']);
        $edit_user = Permission::create(['name' => 'edit user']);
        $delete_user = Permission::create(['name' => 'delete user']);
        $index_role = Permission::create(['name' => 'index role']);
        $create_role = Permission::create(['name' => 'create role']);
        $edit_role = Permission::create(['name' => 'edit role']);
        $delete_role = Permission::create(['name' => 'delete role']);
        $index_user = Permission::create(['name' => 'index album']);
        $index_user = Permission::create(['name' => 'delete album']);
        $dashboard = Permission::create(['name' => 'login dashboard']);


        // or may be done by chaining
        $manager_role = Role::create(['name' => 'manager'])
            ->givePermissionTo($dashboard,$index_user);

        // or may be done by chaining
        $user_role = Role::create(['name' => 'user']);

        $super = Role::create(['name' => 'admin']);
        $super->givePermissionTo(Permission::all());

        $admin->assignRole($super);
        $admin->givePermissionTo($super->permissions);
        $manager->assignRole($manager_role);
        $manager->givePermissionTo($manager_role->permissions);
        $user->assignRole($user_role);
        $user->givePermissionTo($user_role->permissions);


    }
}
