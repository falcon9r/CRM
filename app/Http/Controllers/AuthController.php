<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Repositories\User\UserContract;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    private $userRepository;
    private $userService;

    public function __construct(UserContract $userRepository , \App\Services\User\UserContract $userService)
    {
        $this->userRepository = $userRepository;
        $this->userService = $userService;
    }

    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        if (Auth::attempt($data))
        {
            $user = User::query()->find(\auth()->id());
            return $this->Response($user);
        }

        return response()->json([
            'message' => trans('auth.failed')
        ], \Illuminate\Http\Response::HTTP_UNAUTHORIZED);
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $user = $this->userRepository->create($data);
        return $this->Response($user);
    }

    private function Response($user){
        return response()->json([
            'accessToken' => $user->createToken('Default')->accessToken
        ]);
    }
}
