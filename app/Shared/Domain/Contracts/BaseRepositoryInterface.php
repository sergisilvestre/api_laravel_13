<?php

namespace App\Shared\Domain\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface BaseRepositoryInterface
{
    /**
     * Get all records.
     *
     * @return Collection
     */
    public function all(): Collection;

    /**
     * Paginate records.
     *
     * @param int $perPage
     * @return Collection
     */
    public function paginate(int $perPage = 15): Collection;

    /**
     * Find a record by ID.
     *
     * @param int $id
     * @return Model
     */
    public function find(int $id): Model;

    /**
     * Create a new record.
     *
     * @param array $data
     * @return Model
     */
    public function store(array $data): Model;

    /**
     * Update a record by ID.
     *
     * @param int $id
     * @param array $data
     * @return Model
     */
    public function update(int $id, array $data): Model;

    /**
     * Delete a record by ID.
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;
}
