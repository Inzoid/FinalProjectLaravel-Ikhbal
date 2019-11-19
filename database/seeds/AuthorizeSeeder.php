<?php

use Illuminate\Database\Seeder;

class AuthorizeSeeder extends Seeder
{
    public function run()
    {
        $role_admin = [
            'slug' => 'admin',
            'name' => 'Admin',
            'permissions' => [
                'admin' => true
            ]
        ];
        
        Sentinel::getRoleRepository()->createModel()->fill($role_admin)->save();
        $adminrole = Sentinel::findRoleByName('Admin');
        $user_admin = [
            'first_name'=>'Admin', 
            'last_name'=>'Inzoid', 
            'email'=>'madmin@mail.com', 
            'password'=>'12345678'
        ];
        $adminuser = Sentinel::registerAndActivate($user_admin);
        $adminuser->roles()->attach($adminrole);

        $role_user = [
            'slug' => 'user',
            'name' => 'User',
            'permissions' => [
                'user' => true
            ]
        ];
        Sentinel::getRoleRepository()->createModel()->fill($role_user)->save();
        $userrole = Sentinel::findRoleByName('Member');
        $role_user = [
            'first_name'=>'User', 
            'last_name'=>'Inzoid', 
            'email'=>'user@mail.com', 
            'password'=>'12345678'
        ];
        $user = Sentinel::registerAndActivate($role_user);
        $user->roles()->attach($userrole);
    }
}
