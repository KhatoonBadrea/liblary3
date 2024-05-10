<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{

    /**
     * List of applications to add.
     */
    private $permissions = [
       'create_book',
       'create_main_category',
       'create_sub_category',
       'add_book_to_favorite',
       'add_evaluation',
       'show_book',
       'filter'
    ];


    /**
     * Seed the application's database.
     */ 
    public function run(): void
    {
        foreach ($this->permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}