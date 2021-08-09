<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\Client\StoreClientRequest;
use App\Http\Requests\API\User\LoginUserRequest;
use App\Http\Requests\API\User\StoreUserRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Response;

class AuthController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * @param  StoreUserRequest  $request
     * @return mixed
     */
    public function register(StoreUserRequest $request)
    {
        $user = $this->userRepository->create($request->validated());
        $token = $user->createToken('myapptoken')->plainTextToken;

        return $this->sendResponse([
            'user' => $user,
            'token' => $token
        ], 'User saved successfully');
    }

    /**
     * @param  LoginUserRequest  $request
     * @return Application|ResponseFactory|\Illuminate\Http\Response
     */
    public function login(LoginUserRequest $request)
    {
        $fields = $request->validated();

        $user = $this->userRepository->findByLogin($fields['login']);
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad creds'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        return $this->sendResponse([
            'user' => $user,
            'token' => $token
        ], 'User logged in');
    }

    /**
     * @param  Request  $request
     * @return mixed
     */
    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return $this->sendResponse([], 'User logged out');
    }
}
