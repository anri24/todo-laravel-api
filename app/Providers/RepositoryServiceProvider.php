<?php

declare(strict_types=1);

namespace App\Providers;

use App\Repositories\TodoRepository;
use App\Repositories\TodoRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(
            TodoRepositoryInterface::class,
            TodoRepository::class
        );
    }

    public function boot(): void
    {
        //
    }
}
