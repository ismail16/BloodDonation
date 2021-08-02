<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => 1,
            'name' => 'Super Admin',
            'username' => 'admin',
            'email' => 'admin@email.com',
            'phone' => '01710472020',
            'password' => bcrypt('11111111'),
        ]);
        DB::table('users')->insert([
            'role_id' => 2,
            'name' => 'Student',
            'username' => 'student',
            'email' => 'student@email.com',
            'phone' => '01880162661',
            'password' => bcrypt('22222222'),
        ]);
    }
}
