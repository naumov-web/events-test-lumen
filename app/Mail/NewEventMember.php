<?php

namespace App\Mail;

use App\Models\EventMember;
use Illuminate\Mail\Mailable;

/**
 * Class NewEventMember
 * @package App\Mail
 */
class NewEventMember extends Mailable
{

    /**
     * Subject of letter
     * @var string
     */
    public const SUBJECT = 'Регистрация на новое мероприятие';

    /**
     * Event member instance
     * @var EventMember
     */
    protected $event_member;

    /**
     * NewEventMember constructor.
     * @param EventMember $event_member
     */
    public function __construct(EventMember $event_member)
    {
        $this->event_member = $event_member;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->event_member->email)
            ->subject(self::SUBJECT)
            ->view('mail.new_event_member', [
                'event_member' => $this->event_member
            ]);
    }
}
