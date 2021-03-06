<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'=>'admin',
            'slug'=>Slug::slug('admin'),
            'description'=>'System Admin',
            'is_main'=>1,
            'is_see_admin'=>1,
            'guard_name'=>'web',
        ]);
        Role::create([
            'name'=>'editor',
            'slug'=>Slug::slug('editor'),
            'description'=>'System Editor',
            'is_main'=>1,
            'is_see_admin'=>1,
            'guard_name'=>'web',
        ]);
        Role::create([
            'name'=>'user',
            'slug'=>Slug::slug('user'),
            'description'=>'User',
            'is_main'=>1,
            'is_see_admin'=>0,
            'guard_name'=>'web',
        ]);


    }
}
