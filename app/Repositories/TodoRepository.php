<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Todo;
use Illuminate\Database\Eloquent\{Builder, Collection, Model};

readonly class TodoRepository implements TodoRepositoryInterface
{
    public function __construct(
        protected Todo $model
    ){}

    public function getAll(): Collection
    {
        return $this->model->query()->orderBy('status','ASC')->get();
    }

    public function findById($id): Model|Collection|Builder|array|null
    {
        return $this->model->query()->findOrFail($id);
    }
}
