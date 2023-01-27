<?php

namespace App\Services\User;

class UserService implements UserContract
{

    private  $userRepository;

    public function __construct(\App\Repositories\User\UserContract $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function uniqueCode()
    {
        $code = rand(1000 , 9999);
        $res = $this->userRepository->code($code);
        if($res)
        {
            return $this->uniqueCode();
        }
        else
        {
            return $code;
        }
    }
}