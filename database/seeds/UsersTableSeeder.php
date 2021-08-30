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
            'phone' => '01710472020',
            'email' => 'admin@email.com',
            'gender' => 'Male',
            'photo' => 'default.png',
            'blood_group' => 'B+',
            'date_of_birth' => '10-12-1994',
            'division' => 'Dhaka',
            'district' => 'Tangail',
            'thana' => 'Mirzapur',
            'password' => bcrypt('11111111'),
        ]);

        DB::table('users')->insert([
            'role_id' => 2,
            'name' => 'Author',
            'phone' => '017104072020',
            'email' => 'author@email.com',
            'gender' => 'Male',
            'photo' => 'default.png',
            'blood_group' => 'B+',
            'date_of_birth' => '10-12-1994',
            'division' => 'Dhaka',
            'district' => 'Tangail',
            'thana' => 'Mirzapur',
            'password' => bcrypt('22222222'),
        ]);
    }
}
