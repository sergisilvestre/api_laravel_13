<?php

namespace App\Application\UserVerification\UseCases;

use App\Application\User\UseCases\UpdateUser;
use App\Domain\User\Entities\User;
use App\Infrastructure\Helpers\LogHelper;
use App\Infrastructure\UserVerification\Persistence\Eloquent\UserVerificationRepository;
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
        private UserVerificationRepository $repository,
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

        $userVerification = $this->repository->findByToken($token);

        if (!$userVerification) {
            throw new ModelNotFoundException('Invalid or expired verification token.');
        }

        $this->updateUser->execute(['id' => $userVerification->user_id, 'email_verified_at' => Carbon::now()]);

        return true;
    }
}