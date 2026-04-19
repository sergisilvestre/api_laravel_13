<?php

namespace App\Shared\Infrastructure\Persistence\Eloquent;

use App\Shared\Domain\Contracts\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected Model $model;

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    /**
     * @param int $perPage
     * @return Collection
     */
    public function paginate(int $perPage = 15): Collection
    {
        return $this->model->paginate($perPage);
    }

    /**
     * @param int $id
     * @return Model
     */

    public function find(int $id): Model
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @param array $data
     * @return Model
     */
    public function store(array $data): Model
    {
        return $this->model->create($data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return Model
     */
    public function update(int $id, array $data): Model
    {
        $entity = $this->find($id);
        $entity->update($data);

        return $entity;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return $this->model->destroy($id);
    }
}
