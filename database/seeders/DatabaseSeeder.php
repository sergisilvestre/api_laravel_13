<?php

namespace Database\Seeders;

use App\Domain\User\Entities\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            User::factory()->create();
        }
    }
}
