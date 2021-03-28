<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Support\Facades\Hash;
class PermissionsSeeder extends Seeder
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

        // create permissions
        Permission::create(['name' => 'residents.index']);
        Permission::create(['name' => 'residents.show']);
        Permission::create(['name' => 'residents.create']);
        Permission::create(['name' => 'residents.store']);
        Permission::create(['name' => 'residents.destroy']);
        Permission::create(['name' => 'residents.edit']);
        Permission::create(['name' => 'residents.import']);
        Permission::create(['name' => 'residents.export']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'user']);
        $role1->givePermissionTo('residents.index');
        $role1->givePermissionTo('residents.show');
        $role1->givePermissionTo('residents.export');

        $role2 = Role::create(['name' => 'admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'User 1',
            'email' => 'user1@example.com',
            'password' => Hash::make('1234')
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'Admin 1',
            'email' => 'admin1@example.com',
            'password' => Hash::make('1234')
            
        ]);
        $user->assignRole($role2);
    }
}
