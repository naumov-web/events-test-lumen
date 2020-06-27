<?php

namespace App\Http\Resources\Events;

use App\Http\Resources\BaseApiResource;
use Illuminate\Http\Request;

/**
 * Class EventResource
 * @package App\Http\Resources\Events
 */
final class EventResource extends BaseApiResource
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
            'date_start' => $this->date_start,
            'city_id' => $this->city_id,
        ];
    }
}
