<?php

namespace Tests\Unit\Services;

use App\Jobs\SendNewEventMemberEmail;
use App\Models\Event;
use App\Models\EventMember;
use App\Services\EventMembersService;
use Illuminate\Support\Facades\Queue;
use Tests\BaseTest;

/**
 * Class EventMembersServiceTest
 * @package Tests\Unit\Services
 */
final class EventMembersServiceTest extends BaseTest
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

    /**
     * Check "delete" function
     *
     * @return void
     * @throws \Exception
     */
    public function testDelete()
    {
        /**
         * @var EventMembersService $service
         */
        $service = EventMembersService::getInstance();
        $event = Event::latest()->first();
        $event_member_data = [
            'name' => 'Петр',
            'surname' => 'Петров',
            'email' => 'petrov@mail.com'
        ];
        Queue::fake();

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

        $event_member = EventMember::where('event_id', $event->id)->first();
        $event_member_id = $event_member->id;

        $service->delete($event_member);

        $event_member = EventMember::query()->where('id', $event_member_id)->first();

        $this->assertNull($event_member);
    }
}