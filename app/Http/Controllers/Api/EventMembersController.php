<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventMembers\CreateEventMemberRequest;
use App\Models\Event;
use App\Services\EventMembersService;
use Illuminate\Http\JsonResponse;

/**
 * Class EventMembersController
 * @package App\Http\Controllers\Api
 */
final class EventMembersController extends Controller
{

    /**
     * Event members service instance
     * @var EventMembersService
     */
    protected $event_members_service;

    /**
     * EventMembersController constructor.
     * @param EventMembersService $event_members_service
     */
    public function __construct(EventMembersService $event_members_service)
    {
        $this->event_members_service = $event_members_service;
    }

    /**
     * Create event member
     *
     * @param CreateEventMemberRequest $request
     * @param Event $event
     * @return JsonResponse
     */
    public function create(CreateEventMemberRequest $request, Event $event): JsonResponse
    {
        return response()->json([
            'success' => true
        ]);
    }

}
