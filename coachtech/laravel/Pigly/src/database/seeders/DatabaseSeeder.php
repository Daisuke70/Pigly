<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\WeightLog;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'name' => '山田 太郎',
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
        ]);

        WeightLog::factory()->count(35)->create([
            'user_id' => $user->id,
        ]);
    }
}
