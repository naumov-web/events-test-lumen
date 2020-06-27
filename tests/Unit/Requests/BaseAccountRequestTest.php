<?php

namespace Tests\Unit\Requests;

use App\Models\User;
use Tests\BaseTest;
use Tymon\JWTAuth\Facades\JWTAuth;

/**
 * Class BaseAccountRequestTest
 */
abstract class BaseAccountRequestTest extends BaseTest
{

    /**
     * Signed user instance
     * @var User
     */
    protected $signed_user;

    /**
     * Actions before test
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->signed_user = $this->getUser();
    }

    /**
     * Reset signed user
     *
     * @return void
     */
    protected function resetSignedUser(): void
    {
        $this->signed_user = null;
    }

    /**
     * Execute json request
     *
     * @param string $method
     * @param string $uri
     * @param array $data
     * @param array $headers
     * @return $this
     */
    public function json($method, $uri, array $data = [], array $headers = []) : BaseAccountRequestTest
    {
        if ($this->signed_user) {
            $headers = array_merge([
                'Authorization' => 'Bearer ' . JWTAuth::fromUser($this->signed_user),
            ], $headers);
        }

        return parent::json($method, $uri, $data, $headers);
    }

    /**
     * Get user for login
     *
     * @return User
     */
    protected function getUser(): User
    {
        return User::first();
    }

}
