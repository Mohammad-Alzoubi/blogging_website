<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->name             = 'admin';
        $admin->email            = 'admin@gmail.com';
        $admin->password         = bcrypt('12345678');
        $admin->email_verified_at= NOW();
        $admin->save();

        $admin = new User();
        $admin->name             = 'user';
        $admin->email            = 'user@gmail.com';
        $admin->password         = bcrypt('12345678');
        $admin->email_verified_at= NOW();
        $admin->save();

        User::factory(2)->create();


    }
}
