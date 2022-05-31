<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            [
                'name'       => 'admin01',
                'email'      => 'admin01@gmail.com',
                'password'   => Hash::make("password1234"),
                'created_at' => '2022/01/01 11:11:11',
            ],
            [
                'name'       => 'admin02',
                'email'      => 'admin02@gmail.com',
                'password'   => Hash::make("password1234"),
                'created_at' => '2022/01/01 11:11:11',
            ],
        ]);
    }
}
