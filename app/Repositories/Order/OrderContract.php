<?php
/**
 * Created by PhpStorm.
 * User: falcon9r
 * Date: 18.01.2023
 * Time: 1:12
 */

namespace App\Repositories\Order;


interface OrderContract
{
    public function  OrderActive($user_id);
}