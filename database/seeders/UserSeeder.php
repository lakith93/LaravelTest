<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => Str::random(10),
            'nic' => 123123123 . 'V',
            'address' => Str::random(10),
            'mobile' => '0112123456',
            'email' => Str::random(5) . '@gmail.com',
            'gender' => 'Male',
            'territory_id' => 1,
            'username' => 'admin',
            'password' => Hash::make('Abc@#123'),
            'is_admin' => 1,
        ]);

        DB::table('users')->insert([
            'name' => Str::random(10),
            'nic' => 111222333 . 'V',
            'address' => Str::random(10),
            'mobile' => '0111321654',
            'email' => Str::random(5) . '@gmail.com',
            'gender' => 'Female',
            'territory_id' => 1,
            'username' => 'user',
            'password' => Hash::make('Abc@#123'),
            'is_admin' => 0,
        ]);
    }
}
