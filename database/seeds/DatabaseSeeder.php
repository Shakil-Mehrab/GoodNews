<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\User::class,2)->create();
        factory(App\Model\News::class,100)->create();
        factory(App\Model\Comment::class,150)->create();
        factory(App\Model\Reply::class,300)->create();


    }
}
