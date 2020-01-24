<?php declare(strict_types=1);

namespace MeetingRoomReservationModeling;

class Time
{
    /** @var string */
    private $time;

    public function __construct(string $time)
    {
        assert(strlen($time) === 5 && in_array(substr($time, -2), ["00", "30"], true));

        $this->time = $time;
    }

    public function __toString()
    {
        return $this->time;
    }
}
