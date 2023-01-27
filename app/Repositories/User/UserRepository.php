<?php
/**
 * Created by PhpStorm.
 * User: falcon9r
 * Date: 16.01.2023
 * Time: 2:04
 */

namespace App\Repositories\User;


use App\Models\User;

class UserRepository implements UserContract
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function codeExists($code)
    {
        return $this->user->query()->where('code' , $code)->exists();
    }

    public function create($data)
    {
        return $this->user->query()->create($data);
    }

    public function findByEmail($email)
    {
        return $this->user->query()->where('email' , $email)->first();
    }
}