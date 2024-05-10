<?php
namespace Database\Seeders;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Admin;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $adminPermissions = Permission::all();

        
        $adminRole = Role::create(['name' => 'admin_role']);
      
        $adminRole->syncPermissions($adminPermissions);
       
    }
}