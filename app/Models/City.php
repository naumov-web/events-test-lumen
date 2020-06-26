<?php

namespace App\Models;

/**
 * Class City
 * @package App\Models
 *
 * @property-read int $id
 * @property string $name
 */
final class City extends BaseModel
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];
}
