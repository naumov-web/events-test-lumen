<?php

use App\Services\CitiesService;
use App\Services\EventsService;
use Illuminate\Support\Collection;

/**
 * Class EventsServiceTest
 */
final class EventsServiceTest extends BaseTest
{
    /**
     * Check "index" function
     *
     * @return void
     */
    public function testIndex()
    {
        /**
         * @var EventsService $service
         */
        $service = EventsService::getInstance();
        /**
         * @var CitiesService $cities_service
         */
        $cities_service = CitiesService::getInstance();
        $default_events = config('defaults.events');
        $expected_events = [];

        foreach ($default_events as $default_event) {
            $city = $cities_service->getCityByName($default_event['city_name']);
            $expected_events[] = [
                'name' => $default_event['name'],
                'date_start' => $default_event['date_start'],
                'city_id' => $city->id,
            ];
        }

        // Case 1. All events
        $events = $service->index();
        $real_events = $this->composeRealEvents($events->getModels());

        $this->assertEquals(count($default_events), $events->getCount());
        $this->assertEquals($expected_events, $real_events);

        // Case 2. Limit = 2, offset = 0
        $events = $service->index(['limit' => 2, 'offset' => 0]);
        $real_events = $this->composeRealEvents($events->getModels());

        $this->assertEquals(count($default_events), $events->getCount());
        $this->assertEquals(
            [
                $expected_events[0],
                $expected_events[1],
            ],
            $real_events
        );

        // Case 3. Limit = 2, offset = 2
        $events = $service->index(['limit' => 2, 'offset' => 2]);
        $real_events = $this->composeRealEvents($events->getModels());

        $this->assertEquals(
            [
                $expected_events[2],
                $expected_events[3],
            ],
            $real_events
        );

        // Case 4. Sort by = name, sort direction = desc
        $events = $service->index(['sort_by' => 'name', 'sort_direction' => 'asc']);
        $real_events = $this->composeRealEvents($events->getModels());

        $this->assertEquals(
            [
                $expected_events[3],
                $expected_events[2],
                $expected_events[1],
                $expected_events[0],
            ],
            $real_events
        );
    }

    /**
     * Composer real events
     *
     * @param Collection $events
     * @return array
     */
    protected function composeRealEvents(Collection $events): array
    {
        $real_events = [];

        foreach ($events as $event_model) {
            $real_events[] = [
                'name' => $event_model->name,
                'date_start' => $event_model->date_start,
                'city_id' => $event_model->city_id,
            ];
        }

        return $real_events;
    }
}
