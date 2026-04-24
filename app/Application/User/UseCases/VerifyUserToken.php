<?php

namespace App\Application\User\UseCases;

use App\Application\User\Dto\UserDto;
use App\Domain\User\Entities\User;
use App\Infrastructure\User\Persistence\Eloquent\UserRepository;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class VerifyUserToken
{
    /**
     * Verifica el token de verificación, marca el email como verificado y limpia el token.
     *
     * @param string $token
     * @return User
     * @throws ModelNotFoundException
     */
    public function __construct(private UserRepository $userRepository, private UpdateUser $updateUser) {}

    public function execute(string $token): bool
    {
        $user = $this->userRepository->findByToken($token);

        if ($user) {

            $data = ['email_verified_at' => Carbon::now()];

            $this->updateUser->execute($user->id, $data);

            return true;
        }

        if (!$user) {
            throw new ModelNotFoundException('Invalid or expired verification token.');
        }

        return false;
    }
}
