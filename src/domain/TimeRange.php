<?php declare(strict_types=1);

namespace MeetingRoomReservationModeling;

class TimeRange
{
    private $start;
    private $end;

    public function __construct(Time $start, Time $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    public function __toString()
    {
        return sprintf("%s-%s", $this->start, $this->end);
    }

    public function overlapped(TimeRange $range): bool
    {
        return $range->start >= $this->start && $range->end <= $this->end;
    }
}
