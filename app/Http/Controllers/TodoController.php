<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Todo\{CreateTodoAction, DeleteTodoAction, UpdateTodoAction, UpdateTodoStatusAction};
use App\Http\Requests\TodoRequest;
use App\Http\Resources\TodoResource;
use App\Repositories\TodoRepositoryInterface;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class TodoController extends Controller
{
    public function __construct(
        protected readonly TodoRepositoryInterface $repository,
    ){}

    public function index(): AnonymousResourceCollection
    {
        return TodoResource::collection($this->repository->getAll());
    }

    public function store(CreateTodoAction $createTodo, TodoRequest $request): Response
    {
        $createTodo->execute($request);

        return response()->noContent(201);
    }

    public function show($id): TodoResource
    {
        return TodoResource::make($this->repository->findById($id));
    }

    public function update(UpdateTodoAction $updateTodo, TodoRequest $request, $id): Response
    {
        $updateTodo->execute($request, $id);

        return response()->noContent();
    }

    public function delete(DeleteTodoAction $deleteTodo,$id): Response
    {
        $deleteTodo->execute($id);

        return response()->noContent(202);
    }

    public function updateStatus(UpdateTodoStatusAction $updateTodoStatus, $id): Response
    {
        $updateTodoStatus->execute($id);

        return response()->noContent();
    }
}
