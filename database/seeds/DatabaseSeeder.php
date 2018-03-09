<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $tags = ['うどん', 'そば', 'ラーメン', 'フォー'];
        foreach ($tags as $tag) App\Tag::create(['name' => $tag]);
    }
}
