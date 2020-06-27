<?php

use App\Services\EventsService;
use Illuminate\Database\Seeder;

/**
 * Class EventsSeeder
 */
final class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = config('defaults.events');
        EventsService::getInstance()
            ->importEvents($events);
    }
}
