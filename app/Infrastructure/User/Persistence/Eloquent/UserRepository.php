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
    
    public function __construct()
    {
        $this->model = new User();
    }

    public function all(): Collection
    {

        return $this->model->orderBy('name')->get();
    }

    public function store(array $data): Model
    {
        return $this->model->create($data);
    }
}
