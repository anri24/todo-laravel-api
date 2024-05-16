<?php

namespace App\Services;

class TodoService
{
    public function create($request,$repository)
    {
//        $request['user_id'] = 1;
        $repository->create($request);
    }

}
