<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Luis',
                'email' => 'luis@gmail.com',
                'password' => bcrypt('12345678'),
                'rol' => 'ADMIN',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Juan',
                'email' => 'juan@gmail.com',
                'password' => bcrypt('12345678'),
                'rol' => 'USER',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
