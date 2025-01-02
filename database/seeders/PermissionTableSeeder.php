<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
  
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['name' => 'role-list', 'title' => 'View Roles'],
            ['name' => 'role-create', 'title' => 'Create Role'],
            ['name' => 'role-edit', 'title' => 'Edit Role'],
            ['name' => 'role-delete', 'title' => 'Delete Role'],
            ['name' => 'user-list', 'title' => 'View Users'],
            ['name' => 'user-create', 'title' => 'Create User'],
            ['name' => 'user-edit', 'title' => 'Edit User'],
            ['name' => 'user-delete', 'title' => 'Delete User'],
        ];
        
        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission['name'],
                'title' => $permission['title']
            ]);
        }
        
    }
}
