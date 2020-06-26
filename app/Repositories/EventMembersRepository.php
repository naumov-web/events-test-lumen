<?php

namespace App\Repositories;

use App\Models\EventMember;

/**
 * Class EventMembersRepository
 * @package App\Repositories
 */
final class EventMembersRepository extends BaseRepository
{

    /**
     * @inheritDoc
     */
    protected function getModelClass(): string
    {
        return EventMember::class;
    }
}
