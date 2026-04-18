<?php

namespace App\Shared\Infrastructure\Persistence\Eloquent;

use App\Shared\Domain\Contracts\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected Model $model;

    public function all()
    {
        return $this->model->all();
    }

    public function find(int $id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data)
    {
        $entity = $this->find($id);
        $entity->update($data);

        return $entity;
    }

    public function delete(int $id)
    {
        return $this->model->destroy($id);
    }
}