<?php

declare(strict_types=1);

namespace App\Actions\Todo;

use App\Http\Requests\TodoRequest;
use App\Repositories\TodoRepositoryInterface;

readonly class UpdateTodoAction
{
    public function __construct(private TodoRepositoryInterface $todoRepository)
    {
    }

    public function execute(TodoRequest $request, $id): void
    {
        $todo = $this->todoRepository->findById($id);

        $todo->update($request->validated());
    }
}
