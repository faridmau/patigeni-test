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
        Permission::create(['name' => 'view residents']);
        Permission::create(['name' => 'add residents']);
        Permission::create(['name' => 'edit residents']);
        Permission::create(['name' => 'delete residents']);
        Permission::create(['name' => 'import residents']);
        Permission::create(['name' => 'export residents']);
        // Permission::create(['name' => 'publish residents']);
        // Permission::create(['name' => 'unpublish residents']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'user']);
        $role1->givePermissionTo('view residents');
        $role1->givePermissionTo('export residents');

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
