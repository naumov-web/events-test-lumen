<?php

namespace App\Services;

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
}
