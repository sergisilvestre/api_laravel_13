<?php

namespace App\Infrastructure\User\Persistence\Eloquent;

use App\Domain\User\Entities\User;
use App\Domain\User\Respositories\UserRepositoryInterface;
use App\Shared\Infrastructure\Persistence\Eloquent\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public Model $model;
    
    public function __construct()
    {
        $this->model = new User();
    }

    public function all(){

        return $this->model->orderBy('name')->get();
    }
}
