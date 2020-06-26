<?php

namespace App\Services;

use App\Repositories\BaseRepository;
use App\Repositories\CitiesRepository;

/**
 * Class CitiesService
 * @package App\Services
 */
final class CitiesService extends BaseEntityService
{

    /**
     * @inheritDoc
     */
    protected function getRepository(): BaseRepository
    {
        return new CitiesRepository();
    }
}
