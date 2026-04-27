<?php

namespace App\Infrastructure\UserVeritication\Persistence\Eloquent;

interface UserVerificationRepositoryInterface
{
    /**
     * Busca un registro de verificación de usuario por su token.
     *
     * @param string $token
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function findByToken(string $token);
}