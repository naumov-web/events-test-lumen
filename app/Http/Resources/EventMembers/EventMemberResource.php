<?php

namespace App\Http\Resources\EventMembers;

use App\Http\Resources\BaseApiResource;
use Illuminate\Http\Request;

/**
 * Class EventMemberResource
 * @package App\Http\Resources\EventMembers
 */
class EventMemberResource extends BaseApiResource
{
    /**
     * Convert object to array
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'surname' => $this->surname,
            'email' => $this->email,
        ];
    }
}
