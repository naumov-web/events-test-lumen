<?php

namespace App\Rules;

use App\Models\Event;
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
     * EventMemberEmailUniqueRule constructor.
     * @param Event $event
     */
    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    /**
     * @inheritDoc
     */
    public function passes($attribute, $value)
    {
        // TODO: Implement passes() method.
    }

    /**
     * @inheritDoc
     */
    public function message()
    {
        return config('error_messages.event_member_email_unique');
    }
}
