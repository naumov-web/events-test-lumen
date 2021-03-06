<?php

namespace Tests\Unit\Requests;

use Illuminate\Http\Response;
use Tests\BaseTest;

/**
 * Class LoginRequestTest
 */
final class LoginRequestTest extends BaseTest
{

    /**
     * Check request validation
     *
     * @return void
     */
    public function testValidation()
    {
        foreach ($this->getInvalidValueCases() as $invalid_case) {
            $this->post(
                route('auth.login'),
                $invalid_case
            )->assertResponseStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Get invalid values for test
     *
     * @return array
     */
    public function getInvalidValueCases(): array
    {
        return [
            [],
            ['email' => ''],
            ['email' => '', 'password' => ''],
            ['email' => 'test', 'password' => 'password'],
            ['email' => 'test@test.com', 'password' => 12345],
            ['email' => 'test@test.com', 'password' => true],
        ];
    }

}
