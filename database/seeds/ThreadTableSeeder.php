<?php

use Illuminate\Database\Seeder;

class ThreadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $threads = ['noodle', 'rice', 'bread'];
        foreach ($threads as $thread) App\Thread::create(['name' => $thread]);
    }
}
