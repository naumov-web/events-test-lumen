<?php

namespace App\Http\Resources;

use Illuminate\Support\Collection;

/**
 * Class ListResource
 * @package App\Http\Resources
 */
final class ListResource extends BaseApiResource
{
    /**
     * ListResource constructor.
     *
     * @param string $collection_instance
     * @param Collection $items
     * @param int $count
     */
    public function __construct(string $collection_instance, Collection $items, int $count)
    {
        parent::__construct([
            'items' => $collection_instance::collection($items),
            'count' => $count,
        ]);
    }
}
