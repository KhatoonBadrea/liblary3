<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        
        $admin = Admin::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'), 
            'role_name' => ['admin_role'],
            'status' => 'active',
        ]);

        $role = Role::firstOrCreate(['name' => 'admin_role'], ['guard_name' => 'web']);
        $admin->assignRole($role);
    }
}