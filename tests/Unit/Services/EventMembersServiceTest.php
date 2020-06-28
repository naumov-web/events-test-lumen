<?php

namespace Tests\Unit\Services;

use App\Jobs\SendNewEventMemberEmail;
use App\Models\Event;
use App\Services\EventMembersService;
use Illuminate\Support\Facades\Queue;
use Tests\BaseTest;

/**
 * Class EventMembersServiceTest
 * @package Tests\Unit\Services
 */
class EventMembersServiceTest extends BaseTest
{
    /**
     * Check "create" function
     *
     * @return void
     */
    public function testCreate()
    {
        /**
         * @var EventMembersService $service
         */
        $service = EventMembersService::getInstance();
        $event = Event::first();
        $event_member_data = [
            'name' => 'Иван',
            'surname' => 'Иванов',
            'email' => 'ivanov@mail.com'
        ];
        Queue::fake();

        $this->expectsJobs(SendNewEventMemberEmail::class);

        $service->create($event, $event_member_data);

        $this->seeInDatabase(
            'event_members',
            array_merge(
                [
                    'event_id' => $event->id,
                ],
                $event_member_data
            )
        );
    }
}