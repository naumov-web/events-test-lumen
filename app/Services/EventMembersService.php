<?php

namespace App\Services;

use App\DTO\ListItemsDTO;
use App\Jobs\SendNewEventMemberEmail;
use App\Models\Event;
use App\Models\EventMember;
use App\Repositories\BaseRepository;
use App\Repositories\EventMembersRepository;

/**
 * Class EventMembersService
 * @package App\Services
 */
final class EventMembersService extends BaseEntityService
{

    /**
     * @inheritDoc
     */
    protected function getRepository(): BaseRepository
    {
        return new EventMembersRepository();
    }

    /**
     * Create event member
     *
     * @param Event $event
     * @param array $data
     * @return EventMember
     */
    public function create(Event $event, array $data): EventMember
    {
        /**
         * @var EventMember $model
         */
        $model = $this->getRepository()->store(array_merge(
            $data,
            [
                'event_id'=> $event->id,
            ]
        ));

        $this->sendOnCreateEmail($model);

        return $model;
    }

    /**
     * Send email after create
     *
     * @param EventMember $event_member
     * @return void
     */
    protected function sendOnCreateEmail(EventMember $event_member): void
    {
        dispatch(new SendNewEventMemberEmail($event_member));
    }

    /**
     * Get event member by event and email
     *
     * @param Event $event
     * @param string $email
     * @return EventMember|null
     */
    public function getEventMemberByEmail(Event $event, string $email): ?EventMember
    {
        /**
         * @var EventMember $model
         */
        $model = $this->getRepository()->getFirstByFilters([
            ['event_id', $event->id],
            ['email', $email]
        ]);

        return $model;
    }

    /**
     * Get event members
     *
     * @param Event $event
     * @param array $data
     * @return ListItemsDTO
     */
    public function getEventMembersByEvent(Event $event, array $data): ListItemsDTO
    {
        return $this->getRepository()->index(
            array_merge(
                $data,
                [
                    'filters' => [
                        ['event_id', $event->id]
                    ]
                ]
            )
        );
    }

    /**
     * Show event member detail info
     *
     * @param EventMember $event_member
     * @return EventMember
     */
    public function show(EventMember $event_member): EventMember
    {
        /**
         * @var EventMember $result
         */
        $result = $this->getRepository()->show($event_member);

        return $result;
    }

    /**
     * Delete event member
     *
     * @param EventMember $event_member
     * @return bool
     * @throws \Exception
     */
    public function delete(EventMember $event_member): bool
    {
        return $this->getRepository()->delete($event_member);
    }
}
