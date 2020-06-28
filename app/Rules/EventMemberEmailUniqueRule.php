<?php

namespace App\Rules;

use App\Models\Event;
use App\Services\EventMembersService;
use Illuminate\Contracts\Validation\Rule;

/**
 * Class EventMemberEmailUniqueRule
 * @package App\Rules
 */
class EventMemberEmailUniqueRule implements Rule
{

    /**
     * Event model instance
     * @var Event
     */
    protected $event;

    /**
     * Event members service instance
     * @var EventMembersService
     */
    protected $event_members_service;

    /**
     * EventMemberEmailUniqueRule constructor.
     * @param Event $event
     */
    public function __construct(Event $event)
    {
        $this->event = $event;
        $this->event_members_service = EventMembersService::getInstance();
    }

    /**
     * @inheritDoc
     */
    public function passes($attribute, $value)
    {
        return !(bool)$this->event_members_service->getEventMemberByEmail(
            $this->event,
            $value
        );
    }

    /**
     * @inheritDoc
     */
    public function message()
    {
        return config('error_messages.event_member_email_unique');
    }
}
