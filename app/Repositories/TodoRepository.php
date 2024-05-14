<?php

namespace App\Repositories;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class TodoRepository implements TodoRepositoryInterface
{
    public function __construct(
        protected readonly Todo $model
    ){}

    public function getAll(): Collection
    {
        return $this->model::all();
    }

    public function findById($id)
    {
        return $this->model::query()->findOrFail($id);
    }

    public function create($data)
    {
        return $this->model::create($data);
    }

    public function update($data, $id): void
    {
        $this->findById($id)->update($data);
    }

    public function delete($id): void
    {
        $this->findById($id)->delete();
    }
}
