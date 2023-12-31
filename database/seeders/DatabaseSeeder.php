<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Default Admin',
            'email' => 'test@example.com',
            'phone' => '0788750979',
            'role' => 'register',
            'password' => bcrypt('0788750979'),
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Board member',
            'email' => 'board@example.com',
            'phone' => '0788750979',
            'role' => 'board',
            'password' => bcrypt('0788750979'),
        ]);
    }
}
