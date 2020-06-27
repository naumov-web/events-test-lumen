<?php

namespace App\Services;

use App\DTO\ListItemsDTO;
use App\Repositories\BaseRepository;
use App\Repositories\EventsRepository;
use Illuminate\Support\Arr;
use LogicException;

/**
 * Class EventsService
 * @package App\Services
 */
final class EventsService extends BaseEntityService
{

    /**
     * Cities service instance
     * @var CitiesService
     */
    protected $cities_service;

    /**
     * EventsService constructor.
     */
    public function __construct()
    {
        $this->cities_service = new CitiesService();
    }

    /**
     * @inheritDoc
     */
    protected function getRepository(): BaseRepository
    {
        return new EventsRepository();
    }

    /**
     * Import multiple events
     *
     * @param array $events
     * @return void
     */
    public function importEvents(array $events): void
    {
        foreach ($events as $event) {
            $event_data = Arr::only(
                $event,
                [
                    'name',
                    'date_start',
                ]
            );

            $city = $this->cities_service->getCityByName($event['city_name']);

            if (!$city) {
                throw new LogicException('City not found!');
            }

            $event_data['city_id'] = $city->id;

            $this->getRepository()->storeIfNotExists($event_data);
        }
    }

    /**
     * Get events list
     *
     * @param array $data
     * @return ListItemsDTO
     */
    public function index(array $data = []): ListItemsDTO
    {
        return $this->getRepository()->index($data);
    }
}
