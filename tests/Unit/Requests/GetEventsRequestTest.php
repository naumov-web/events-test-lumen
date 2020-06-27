<?php

namespace Tests\Unit\Requests;

use Illuminate\Http\Response;

/**
 * Class GetEventsRequestTest
 */
final class GetEventsRequestTest extends BaseAccountRequestTest
{

    /**
     * Check request validation
     *
     * @return void
     */
    public function testValidation()
    {
        foreach ($this->getInvalidValueCases() as $invalid_case) {
            $this->json(
                'GET',
                route('account.get-events', $invalid_case)
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
            ['limit' => 2],
            ['offset' => 2],
            ['sort_by' => 'id'],
            ['sort_direction' => 'asc'],
            ['sort_by' => 'id', 'sort_direction' => 'test'],
            ['limit' => 2, 'sort_by' => 'id', 'sort_direction' => 'desc'],
        ];
    }

}
