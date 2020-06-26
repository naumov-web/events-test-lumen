<?php

namespace App\Repositories;

use App\Models\City;

/**
 * Class CitiesRepository
 * @package App\Repositories
 */
final class CitiesRepository extends BaseRepository
{

    /**
     * @inheritDoc
     */
    protected function getModelClass(): string
    {
        return City::class;
    }
}
