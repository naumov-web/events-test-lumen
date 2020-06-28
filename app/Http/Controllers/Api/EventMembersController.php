<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventMembers\CreateEventMemberRequest;
use App\Http\Requests\EventMembers\GetEventMembersRequest;
use App\Http\Resources\EventMembers\EventMemberResource;
use App\Http\Resources\ListResource;
use App\Models\Event;
use App\Models\EventMember;
use App\Services\EventMembersService;
use App\Traits\UseEventMemberValidator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

/**
 * Class EventMembersController
 * @package App\Http\Controllers\Api
 */
final class EventMembersController extends Controller
{

    use UseEventMemberValidator;

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
        /**
         * Не очень красивое решение, так как валидация должна быть в классе запроса.
         * Но в классе запроса метод route не работает
         */
        $validator = $this->getEventMemberValidator(
            $request->all(),
            $event
        );

        try {
            $validator->validate();
        } catch (\Exception $exception) {
            return response()->json(
                [
                    'errors' => $validator->errors()
                ],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        $this->event_members_service->create(
            $event,
            $request->all()
        );

        return response()->json([
            'success' => true
        ]);
    }

    /**
     * Get event members
     *
     * @param GetEventMembersRequest $request
     * @param Event $event
     * @return ListResource
     */
    public function indexByEvent(GetEventMembersRequest $request, Event $event): ListResource
    {
        $event_members = $this->event_members_service->getEventMembersByEvent($event, $request->all());

        return new ListResource(
            EventMemberResource::class,
            $event_members->getModels(),
            $event_members->getCount()
        );
    }

    /**
     * Delete event member
     *
     * @param EventMember $event_member
     * @return JsonResponse
     * @throws \Exception
     */
    public function delete(EventMember $event_member): JsonResponse
    {
        $this->event_members_service->delete($event_member);

        return response()->json([
            'success' => true
        ]);
    }

}
