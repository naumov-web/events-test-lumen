<?php

namespace App\Services;

use App\Repositories\BaseRepository;
use App\Repositories\EventsRepository;

/**
 * Class EventsService
 * @package App\Services
 */
final class EventsService extends BaseEntityService
{

    /**
     * @inheritDoc
     */
    protected function getRepository(): BaseRepository
    {
        return new EventsRepository();
    }
}
