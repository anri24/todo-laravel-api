<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Http\Resources\TodoResource;
use App\Models\Todo;
use App\Repositories\TodoRepositoryInterface;
use App\Services\TodoService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TodoController extends Controller
{
    public function __construct(
        protected readonly TodoRepositoryInterface $repository,
        protected  readonly TodoService $service,
    ){}

    public function index()
    {
        return TodoResource::collection($this->repository->getAll());
    }

    public function show($id)
    {
        return TodoResource::make($this->repository->findById($id));
    }

    public function store(TodoRequest $request)
    {
        return $this->service->create($request->validated(),$this->repository);
    }

    public function update(TodoRequest $request, $id)
    {
        return $this->repository->update($request->validated(),$id);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }

}
