<?php

namespace Database\Seeders;

use App\Api\V1\Requests\User\StoreUserRequest;
use App\Application\User\UseCases\StoreUser;
use App\Domain\User\Entities\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(StoreUser $useCase): void
    {
        $this->createUser($useCase);

        for ($i = 0; $i < 10; $i++) {
            User::factory()->create();
        }
    }

    private function createUser(StoreUser $useCase): void
    {
        $userData = [
            'name'      => 'user',
            'email'     => 'user@mail.com',
            'password'  => Hash::make('12345678')
        ];

        $useCase->execute($userData);
    }
}
