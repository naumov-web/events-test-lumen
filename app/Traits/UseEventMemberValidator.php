<?php

namespace App\Traits;

use App\Models\Event;
use App\Models\EventMember;
use App\Rules\EventMemberEmailUniqueRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Validator as ValidatorFacade;

/**
 * Trait UseEventMemberValidator
 * @package App\Traits
 */
trait UseEventMemberValidator
{

    /**
     * Get event member validator
     *
     * @param array $data
     * @param Event $event
     * @param EventMember|null $event_member
     * @return Validator
     */
    protected function getEventMemberValidator(array $data, Event $event, EventMember $event_member = null): Validator
    {
        return ValidatorFacade::make(
            $data,
            [
                'name' => ['required', 'string'],
                'surname' => ['required', 'string'],
                'email' => ['required', 'string', 'email', new EventMemberEmailUniqueRule($event, $event_member)],
            ]
        );
    }

}
