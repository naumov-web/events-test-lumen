<?php

namespace App\Models;

/**
 * Class EventMember
 * @package App\Models
 *
 * @property-read int $id
 * @property int $event_id
 * @property string $name
 * @property string $surname
 * @property string $email
 */
final class EventMember extends BaseModel
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
