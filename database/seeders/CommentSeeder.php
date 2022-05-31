<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            [
                'user_id'    => '1',
                'thread_id'  => '1',
                'comment'    => 'テストコメントです',
                'created_at' => '2022/01/01 12:11:11',
            ],
            [
                'user_id'    => '2',
                'thread_id'  => '1',
                'comment'    => '2テストコメントです',
                'created_at' => '2022/01/01 12:11:11',
            ],
            [
                'user_id'    => '3',
                'thread_id'  => '1',
                'comment'    => '2テストコメントです',
                'created_at' => '2022/01/01 12:15:11',
            ],
        ]);
    }
}
