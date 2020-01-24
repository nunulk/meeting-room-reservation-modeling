<?php declare(strict_types=1);

namespace MeetingRoomReservationModeling;

class MeetingRoom
{
    public $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function reserve(TimeRange $range)
    {
        $reservation = new Reservation($this, $range);
        return $reservation;
    }

}
