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
        return $this->model::query()->orderBy('status','ASC')->get();
    }

    public function findById($id)
    {
        return $this->model::query()->findOrFail($id);
    }

    public function create($data)
    {
        return $this->model::create($data);
    }

    public function update($data, $id)
    {
        return $this->findById($id)->update($data);
    }

    public function delete($id)
    {
        return $this->findById($id)->delete();
    }

    public function updateStatus($id)
    {
        return $this->findById($id)->update(['status' => $this->findById($id)->status === 0 ? 1 : 0]);
    }
}
