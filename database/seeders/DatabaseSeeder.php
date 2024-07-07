<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'username' => 'Christine',
            'password' => 'password123',
            'firstname' => 'Christine Joy',
            'middlename' => 'Cleofe',
            'lastname' => 'Clerigo'
        ]);

        User::create([
            'username' => 'Camille',
            'password' => 'password123',
            'firstname' => 'Camille',
            'middlename' => 'Abang',
            'lastname' => 'Morte'
        ]);
    }
}
