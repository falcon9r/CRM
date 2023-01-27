<?php

namespace App\Providers;

use App\Repositories\Client\ClientContract;
use App\Repositories\Client\ClientRepository;
use App\Repositories\Order\OrderContract;
use App\Repositories\Order\OrderRepository;
use App\Repositories\User\UserContract;
use App\Repositories\User\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserContract::class , UserRepository::class);
        $this->app->bind(OrderContract::class , OrderRepository::class);
        $this->app->bind(ClientContract::class , ClientRepository::class);
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
