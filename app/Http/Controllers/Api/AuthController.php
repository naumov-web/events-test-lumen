<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\UsersService;
use Illuminate\Http\Response;

/**
 * Class AuthController
 * @package App\Http\Controllers\Api
 */
final class AuthController extends Controller
{

    /**
     * Users service instance
     * @var UsersService
     */
    protected $users_service;

    /**
     * AuthController constructor.
     * @param UsersService $users_service
     */
    public function __construct(UsersService $users_service)
    {
        $this->users_service = $users_service;
    }

    /**
     * Login user
     *
     * @param LoginRequest $request
     * @return array
     */
    public function login(LoginRequest $request): array
    {
        $data = $request->all();
        $token = $this->users_service->getToken($data);

        if (!$token) {
            abort(Response::HTTP_UNAUTHORIZED);
        }

        return [
            'token' => $token
        ];
    }

}
