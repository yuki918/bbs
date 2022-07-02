<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Thread;
use App\Models\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            AdminSeeder::class,
            ThreadSeeder::class,
            CommentSeeder::class,
        ]);
        Thread::factory(100)->create();
        Comment::factory(400)->create();
    }
}
