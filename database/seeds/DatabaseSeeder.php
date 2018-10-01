<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'firstname' =>'Guest',
            'lastname' => 'User',
            'email' => 'guest@medico.com',
            'password' => '$2y$10$UckdnH8kzTjxTKWjkAUyHegDyMEqyouR/GxpJ3sQRp34hqmoBZEVq',
        ]);
    }
}
