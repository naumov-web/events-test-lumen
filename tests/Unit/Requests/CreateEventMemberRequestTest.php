<?php

namespace Tests\Unit\Requests;

use App\Models\Event;
use Illuminate\Http\Response;

/**
 * Class CreateEventMemberRequestTest
 * @package Tests\Unit\Requests
 */
final class CreateEventMemberRequestTest extends BaseAccountRequestTest
{
    /**
     * Check request validation
     *
     * @return void
     */
    public function testValidation()
    {
        $event = Event::first();

        // Create event member for checking of unique rule
        $this->json(
            'POST',
            route('account.create-event-member', ['event' => $event->id]),
            [
                'name' => 'Петр',
                'surname' => 'Петров',
                'email' => 'petrov@mail.com'
            ]
        );

        foreach ($this->getInvalidValueCases() as $invalid_case) {
            $this->json(
                'POST',
                route('account.create-event-member', ['event' => $event->id]),
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
            ['name' => '', 'surname' => '', 'email' => ''],
            ['name' => 'Иван', 'surname' => '', 'email' => ''],
            ['name' => 'Иван', 'surname' => 'Петров', 'email' => ''],
            ['name' => 'Иван', 'surname' => 'Петров', 'email' => 'mail'],
            ['name' => 'Иван', 'surname' => 'Петров', 'email' => 'petrov@mail.com'],
            ['name' => 123, 'surname' => 'Петров', 'email' => 'ipetrov@mail.com'],
            ['name' => 'Иван', 'surname' => 123, 'email' => 'ipetrov@mail.com'],
            ['name' => true, 'surname' => 'Петров', 'email' => 'ipetrov@mail.com'],
            ['name' => 'Иван', 'surname' => true, 'email' => 'ipetrov@mail.com'],
        ];
    }
}
