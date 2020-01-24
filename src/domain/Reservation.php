<?php
declare(strict_types=1);

namespace MeetingRoomReservationModeling;

class Reservation
{
    /** @var MeetingRoom */
    public $room;

    /** @var TimeRange */
    public $range;

    public function __construct(MeetingRoom $room, TimeRange $range)
    {
        $this->room = $room;
        $this->range = $range;
    }
}
