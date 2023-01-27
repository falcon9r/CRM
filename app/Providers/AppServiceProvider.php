<?php

namespace App\Providers;

use App\Models\Client;
use App\Models\Order;
use App\Rules\RightClient;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Illuminate\Support\Facades\Validator::extend('right_client', function ($attribute, $value, $parameters, $validator){
            $user_id = -1;
            try
            {
                $user_id = Client::query()->findOrFail($value)->user_id;
            }catch (\Exception $exception)
            {
                $user_id = -1;
            }
            return $user_id == auth()->id();
        }, 'The user have not this client.');

        \Illuminate\Support\Facades\Validator::extend('user_has_order', function ($attribute, $value, $parameters, $validator){
            $order = Order::query()->findOrFail($value);
            $client = Client::query()->findOrFail($order->client_id);
            return $client->user_id != auth()->id();
        }, 'The user have not this order.');

    }
}
