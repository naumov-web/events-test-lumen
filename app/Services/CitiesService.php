<?php

namespace App\Services;

use App\Models\City;
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

    /**
     * Import cities
     *
     * @param array $cities
     * @return void
     */
    public function importCities(array $cities): void
    {
        foreach ($cities as $city) {
            $this->getRepository()->storeIfNotExists(
                $city
            );
        }
    }

    /**
     * Get city by name
     *
     * @param string $name
     * @return City|null
     */
    public function getCityByName(string $name): ?City
    {
        /**
         * @var City $model
         */
        $model = $this->getRepository()->getFirstByFilters([
            ['name', $name]
        ]);

        return $model;
    }
}
