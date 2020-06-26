<?php

namespace App\Repositories;

use App\Models\Event;

/**
 * Class EventsRepository
 * @package App\Repositories
 */
final class EventsRepository extends BaseRepository
{

    /**
     * @inheritDoc
     */
    protected function getModelClass(): string
    {
        return Event::class;
    }
}
