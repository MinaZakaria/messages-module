<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Infrastructure\Repositories\UserRepository;
use App\Domain\Repositories\UserRepositoryInterface;

use App\Infrastructure\Repositories\MessageRepository;
use App\Domain\Repositories\MessageRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(MessageRepositoryInterface::class, MessageRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
