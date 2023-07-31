<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'admin',
            'user',
        ];
        for ($i=0; $i<count($roles) ; $i++){
            $role = Role::create(['name' => $roles[$i] ]);
        }

//        permissions
        $group_name = [
            'user',
            'post',
            'Roles',
        ];

        $permission_name = [
            ['user.menu', 'user.all', 'user.create', 'user.edit', 'user.delete'],
            ['post.menu', 'post.all', 'post.create', 'post.edit', 'post.delete'],
            ['roles.menu']
        ];

        for ($i=0; $i<count($group_name) ; $i++){
            for ($j=0; $j< count($permission_name[$i]) ; $j++){
                $role = Permission::create([
                    'name' => $permission_name[$i][$j],
                    'group_name' => $group_name[$i],
                ]);
            }
        }

        $role = Role::findByName('admin');
        $role->syncPermissions([
            'user.menu', 'user.all', 'user.create', 'user.edit', 'user.delete',
            'post.menu', 'post.all', 'post.create', 'post.edit', 'post.delete',
            'roles.menu',
        ]);

        $user = User::find(1);
        $user->assignRole('admin');



        $role = Role::findByName('user');
        $role->syncPermissions([
            'post.menu', 'post.all', 'post.create', 'post.edit', 'post.delete',
        ]);

        $user = User::find(2);
        $user->assignRole('user');
    }
}
