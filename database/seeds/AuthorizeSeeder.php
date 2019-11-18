<?php

use Illuminate\Database\Seeder;
 
class AuthorizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = [
            "slug" => "admin",
            "name" => "Admin",
            ]
        ];

        Sentinel::getRoleRepository()->createModel()->fill($role_admin)->save();
        $admin_role = Sentinel::findRoleByName('Admin');
        $user_admin = ["first_name"=>"M", "last_name"=>"Admin",
                        "email"=>"madmin@mail.com", "password"=>"12345678"];

        $adminuser = Sentinel::registerAndActivate($user_admin);
        $adminuser->roles()->attach($admin_role);

        $role_writer = [
            "slug" => "writer",
            "name" => "Writer",
            ]
        ];

        Sentinel::getRoleRepository()->createModel()->fill($role_writer)->save();
        $writerrole = Sentinel::findRoleByName('User');
        $user_writer = ["first_name" => "Oda", "last_name" => "E",
                        "email" => "oda@e.com", "password" => "12345678"];
        $writeruser = Sentinel::registerAndActivate($user_writer);

        $writeruser->roles()->attach($writerrole);

    }
}
