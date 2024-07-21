<?php

declare(strict_types=1);

namespace App\Actions\Todo;

use App\Repositories\TodoRepositoryInterface;

readonly class UpdateTodoStatusAction
{
    public function __construct(private TodoRepositoryInterface $todoRepository)
    {
    }

    public function execute($id): void
    {
        $todo = $this->todoRepository->findById($id);

        $todo->update([
           'status' => !$todo->status
        ]);
    }
}
