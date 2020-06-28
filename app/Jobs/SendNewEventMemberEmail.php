<?php

namespace App\Jobs;

use App\Models\EventMember;

/**
 * Class SendNewEventMemberEmail
 * @package App\Jobs
 */
final class SendNewEventMemberEmail extends Job
{

    /**
     * Event member instance
     * @var EventMember
     */
    protected $event_member;

    /**
     * Create a new job instance.
     *
     * @param EventMember $event_member
     */
    public function __construct(EventMember $event_member)
    {
        $this->event_member = $event_member;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
    }
}
