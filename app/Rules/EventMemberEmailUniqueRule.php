<?php

namespace App\Rules;

use App\Models\Event;
use App\Models\EventMember;
use App\Services\EventMembersService;
use Illuminate\Contracts\Validation\Rule;

/**
 * Class EventMemberEmailUniqueRule
 * @package App\Rules
 */
final class EventMemberEmailUniqueRule implements Rule
{

    /**
     * Event model instance
     * @var Event
     */
    protected $event;

    /**
     * Event member model instance
     * @var Event
     */
    protected $event_member;

    /**
     * Event members service instance
     * @var EventMembersService
     */
    protected $event_members_service;

    /**
     * EventMemberEmailUniqueRule constructor.
     * @param Event $event
     * @param EventMember $event_member
     */
    public function __construct(Event $event, EventMember $event_member = null)
    {
        $this->event = $event;
        $this->event_member = $event_member;
        $this->event_members_service = EventMembersService::getInstance();
    }

    /**
     * @inheritDoc
     */
    public function passes($attribute, $value)
    {
        return !(bool)$this->event_members_service->getEventMemberByEmail(
            $this->event,
            $value,
            $this->event_member
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
