<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Reset cached roles and permissions
         app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

         // Create Permissions
         $permissions = [
             'view dashboard',
             'manage users',
             'view logs',
         ];
 
         foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
         }
 
         // Create Roles and Assign Permissions
         $adminRole = Role::create(['name' => 'Admin']);
         $userRole = Role::create(['name' => 'User']);
 
         // Assign all permissions to Admin
         $adminRole->givePermissionTo($permissions);
 
         // Assign limited permissions to User
         $userRole->givePermissionTo(['view dashboard']);
 
         // Create Default Admin User
         \App\Models\User::factory()->create([
             'name' => 'Admin User',
             'email' => 'admin@example.com',
             'password' => bcrypt('password'),
         ])->assignRole($adminRole);
 
         // Create Default Regular User
         \App\Models\User::factory()->create([
             'name' => 'Regular User',
             'email' => 'user@example.com',
             'password' => bcrypt('password'),
         ])->assignRole($userRole);
 
         $this->command->info('Roles, permissions, and default users created successfully.');
    }
}
