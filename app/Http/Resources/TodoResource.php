<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TodoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
//            'user' => UserResource::make($this->user()->first()),
            'title' => $this->title,
//            'description' => $this->when(true,function () use ($request){
//                if ($request->routeIs('todos') && strlen($this->description) > 25){
//                    return substr($this->description, 0, 25).'...';
//                }
//                    return $this->description;
//
//            }),
            'description' => $this->description
        ];
    }
}
