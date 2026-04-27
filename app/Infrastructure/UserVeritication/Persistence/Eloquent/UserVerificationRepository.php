<?php

namespace App\Infrastructure\UserVerification\Persistence\Eloquent;

use App\Domain\UserVerification\Entities\UserVerification;
use App\Infrastructure\UserVeritication\Persistence\Eloquent\UserVerificationRepositoryInterface;
use App\Shared\Infrastructure\Persistence\Eloquent\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class UserVerificationRepository extends BaseRepository implements UserVerificationRepositoryInterface
{
    public Model $model;

    /**
     * UserVerificationRepository constructor.
     */
    public function __construct()
    {
        $this->model = new UserVerification();
    }

    /**
     * Busca un registro de verificación de usuario por su token.
     *
     * @param string $token
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function findByToken(string $token)
    {
        return $this->model->where('token', $token)->first();
    }


    /**
     * Verifica si un token de verificación de usuario ya existe.
     *
     * @param string $token
     * @return bool
     */
    public function tokenExists(string $token): bool
    {
        return $this->model
            ->where('expires_at', '>', now())
            ->where('token', $token)->exists();
    }
}
