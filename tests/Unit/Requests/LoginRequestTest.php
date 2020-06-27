<?php

use Illuminate\Http\Response;

/**
 * Class LoginRequestTest
 */
class LoginRequestTest extends BaseTest
{

    /**
     * Check request validation for one case
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
