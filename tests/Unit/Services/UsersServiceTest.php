<?php

use App\Services\UsersService;

/**
 * Class UsersServiceTest
 */
final class UsersServiceTest extends BaseTest
{

    /**
     * Check "getToken" function
     *
     * @return void
     */
    public function testGetToken()
    {
        /**
         * @var UsersService $service
         */
        $service = UsersService::getInstance();
        $data = config('defaults.users')[0];

        // Case 1. Invalid credentials
        $token = $service->getToken([
            'email' => 'incorrect' . $data['email'],
            'password' => 'incorrect-' . $data['password'],
        ]);
        $this->assertEmpty($token);

        // Case 2. Valid credentials
        $token = $service->getToken($data);
        $this->assertNotEmpty($token);
    }

}
