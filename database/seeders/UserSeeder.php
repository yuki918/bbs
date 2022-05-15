<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            [
                'name'       => 'test01',
                'email'      => 'test01@gmail.com',
                'password'   => Hash::make("password1234"),
                'created_at' => '2022/01/01 11:11:11',
            ],
            [
                'name'       => 'test02',
                'email'      => 'test02@gmail.com',
                'password'   => Hash::make("password1234"),
                'created_at' => '2022/01/01 11:11:11',
            ],
            [
                'name'       => 'test03',
                'email'      => 'test03@gmail.com',
                'password'   => Hash::make("password1234"),
                'created_at' => '2022/01/01 11:11:11',
            ],
            [
                'name'       => 'test04',
                'email'      => 'test04@gmail.com',
                'password'   => Hash::make("password1234"),
                'created_at' => '2022/01/01 11:11:11',
            ],
        ]);
    }
}
