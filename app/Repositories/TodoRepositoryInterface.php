<?php

namespace App\Repositories;

interface TodoRepositoryInterface
{
    public function getAll();

    public function findById($id);
}
