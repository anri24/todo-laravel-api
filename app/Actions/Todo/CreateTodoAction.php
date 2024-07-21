<?php

declare(strict_types=1);

namespace App\Actions\Todo;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;

class CreateTodoAction
{
    public function execute(TodoRequest $request): void
    {
        Todo::query()->create($request->validated());
    }
}
