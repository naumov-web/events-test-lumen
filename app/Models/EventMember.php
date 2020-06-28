<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    /**
     * Get event relation
     *
     * @return BelongsTo
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
