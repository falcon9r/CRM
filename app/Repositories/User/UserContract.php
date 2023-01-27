<?php
/**
 * Created by PhpStorm.
 * User: falcon9r
 * Date: 16.01.2023
 * Time: 2:04
 */

namespace App\Repositories\User;


use App\Models\User;

interface UserContract
{
    public function create($data);

    public  function codeExists($code);

    public function  findByEmail($email);
}