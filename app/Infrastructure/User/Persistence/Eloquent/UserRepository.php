<?php

namespace App\Infrastructure\User\Persistence\Eloquent;

use App\Domain\User\Entities\User;
use App\Domain\User\Respositories\UserRepositoryInterface;
use App\Shared\Infrastructure\Persistence\Eloquent\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public Model $model;

    /**
     * UserRepository constructor.
     */
    public function __construct()
    {
        $this->model = new User();
    }

    /**
     * Devuelve una colección de todos los usuarios ordenados por nombre.
     *
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->orderBy('name')->get();
    }

    /**
     * Almacena un nuevo usuario en la base de datos.
     *
     * @param array $data
     * @return Model
     */
    public function store(array $data): Model
    {
        return $this->model->create($data);
    }

    /**
     * Verifica si existe un usuario con el token de verificación dado.
     */
    public function tokenExists(string $token): bool
    {
        return $this->model->where('verification_token', $token)->exists();
    }

    /**
     * Busca un usuario por el token de verificación.
     */
    public function findByToken(string $token): ?User
    {
        $alreadyVerified = $this->model->where('verification_token', $token)->whereNotNull('email_verified_at')->exists();
        
        if ($alreadyVerified) {
            return null; // El token ya ha sido verificado
        }

        return $this->model->where('verification_token', $token)->first();
    }
}
