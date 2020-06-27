<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Events\GetEventsRequest;
use App\Http\Resources\Events\EventResource;
use App\Http\Resources\ListResource;
use App\Services\EventsService;

/**
 * Class EventsController
 * @package App\Http\Controllers\Api
 */
final class EventsController extends Controller
{

    /**
     * Events service instance
     * @var EventsService
     */
    protected $events_service;

    /**
     * EventsController constructor.
     * @param EventsService $events_service
     */
    public function __construct(EventsService $events_service)
    {
        $this->events_service = $events_service;
    }

    /**
     * Get events list
     *
     * @param GetEventsRequest $request
     * @return ListResource
     */
    public function index(GetEventsRequest $request): ListResource
    {
        $events = $this->events_service->index($request->all());

        return new ListResource(
            EventResource::class,
            $events->getModels(),
            $events->getCount()
        );
    }

}
