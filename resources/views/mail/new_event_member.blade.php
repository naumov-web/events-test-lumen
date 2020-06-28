<?php

    use App\Models\EventMember;

    /**
     * @var EventMember $event_member
     */
?>
<h3>Приглашение на мерориятие</h3>
<p>
    Добрый день, {{$event_member->name}}.
</p>
<p>
    Вы приглашены на мероприятие "{{$event_member->event->name}}".
    Дата начала мероприятия {{$event_member->event->date_start}}.
</p>
