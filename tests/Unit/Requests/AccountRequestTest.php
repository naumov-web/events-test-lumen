<?php

namespace Tests\Unit\Requests;

use Illuminate\Http\Response;

/**
 * Class AccountRequestTest
 * @package Tests\Unit\Requests
 */
class AccountRequestTest extends BaseAccountRequestTest
{
    /**
     * Check request authorization
     *
     * @return void
     */
    public function testAuthorization()
    {
        // Case 1. User is signed
        $this->json(
            'GET',
            route('account.get-events')
        )->assertResponseOk();

        // Case 2. User is not signed
        $this->resetSignedUser();
        $this->json(
            'GET',
            route('account.get-events')
        )->assertResponseStatus(Response::HTTP_UNAUTHORIZED);
    }
}
