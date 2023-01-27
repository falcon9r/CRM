<?php
/**
 * Created by PhpStorm.
 * User: falcon9r
 * Date: 18.01.2023
 * Time: 1:13
 */

namespace App\Repositories\Order;


use App\Models\Order;

class OrderRepository implements OrderContract
{
    public function OrderActive($user_id)
    {
        return Order::query()->where('user_id' , $user_id)->get();
    }
}