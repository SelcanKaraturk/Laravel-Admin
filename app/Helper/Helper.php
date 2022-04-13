<?php


namespace App\Helper;


use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Helper
{
    public static function setRoles (){

        $defaultSystemVars = getVar('system');

        $roles = Role::all()->pluck('name')->all();
        $permission = Permission::pluck('name')->all();
        $user = User::pluck('email')->all();

        foreach ($defaultSystemVars['default_role'] as $item) {
            //return $item['name'];
            if (!in_array(slugify($item['name']), $roles)) {
                if (slugify($item['name']) !== 'user') {
                    $is_see_admin = 1;
                } else {
                    $is_see_admin = 0;
                }
                Role::create([
                    'name' => slugify($item['name']),
                    'description' => $item['description'],
                    'is_main' => $item['is_main'],
                    'is_see_admin' => $is_see_admin,
                    'guard_name' => $item['guard_name'],

                ]);
            }
        }
        foreach ($defaultSystemVars['default_permission'] as $item) {
            //return $item['name'];
            if (!in_array(slugify($item['name']), $permission)) {

                Permission::create([
                    'name' => slugify($item['name']),
                    'is_main' => $item['is_main'],
                    'guard_name' => $item['guard_name']
                ]);
            }
        }
        foreach ($defaultSystemVars['default_users'] as $item) {

            if (!in_array($item['email'], $user)) {
                User::create([
                    'name' => $item['name'],
                    'email' => $item['email'],
                    'password' => \Hash::make($item['password'])
                ]);
            }
        }

        $permission = Permission::all();

        $admin_role = Role::whereName('admin')->first();
        $user_role = Role::whereName('user')->first();
        $adminUser = User::whereEmail('admin@dingo.com')->first();
        $webUser = User::whereEmail('user@dingo.com')->first();

        $adminUser->assignRole($admin_role);
        $webUser->assignRole($user_role);
        $adminUser->givePermissionTo($permission);
        $admin_role->givePermissionTo($permission);
    }

}
