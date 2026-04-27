<?php

namespace App\Application\User\UseCases;

use App\Application\User\Dto\UserDto;
use App\Domain\User\Entities\User;
use App\Infrastructure\Helpers\LogHelper;
use App\Infrastructure\User\Persistence\Eloquent\UserRepository;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class VerifyUserVerification
{
    /**
     * Verifica el token de verificación, marca el email como verificado y limpia el token.
     *
     * @param string $token
     * @return User
     * @throws ModelNotFoundException
     */
    public function __construct(
        private UserVerificationRepository $userVerificationRepository,
        private UpdateUser $updateUser
    ) {}

    /**
     * Verifica el token de verificación, marca el email como verificado y limpia el token.
     *
     * @param string $token
     * @return bool
     * @throws ModelNotFoundException
     */
    public function execute(string $token): bool
    {
        LogHelper::write('users', 'Verifying user token: ' . $token);

        $userVerification = $this->userVerificationRepository->findByToken($token);

        if (!$userVerification) {
            throw new ModelNotFoundException('Invalid or expired verification token.');
        }

        $this->updateUser->execute(['id' => $userVerification->user_id, 'email_verified_at' => Carbon::now()]);

        return true;
    }
}
X