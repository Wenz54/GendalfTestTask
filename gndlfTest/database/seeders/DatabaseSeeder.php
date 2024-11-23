<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Создаем администратора
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'wenz5455@gmail.com',
            'password' => Hash::make('5455'),
            'role' => 'admin', // а это сидер, мы тут по дефолту делаем пользователя
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
