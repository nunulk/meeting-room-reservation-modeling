<?php declare(strict_types=1);

namespace MeetingRoomReservationModeling\Test;

use PHPUnit\Framework\TestCase;
use MeetingRoomReservationModeling\MeetingRoom;
use MeetingRoomReservationModeling\Time;
use MeetingRoomReservationModeling\TimeRange;

class MeetingRoomTest extends TestCase
{
    public function testReserve()
    {
        $timeRange = new TimeRange(new Time('12:00'), new Time('15:00'));

        $meetingRoom = new MeetingRoom('test');
        $meetingRoom->reserve($timeRange);
        $this->assertTrue(true);
    }

    public function testCannotReserve()
    {
        $this->expectException(\RuntimeException::class);

        $timeRange = new TimeRange(new Time('12:00'), new Time('15:00'));

        $meetingRoom = new MeetingRoom('test');
        $meetingRoom->reserve($timeRange);

        $timeRange = new TimeRange(new Time('14:00'), new Time('15:00'));

        $meetingRoom = new MeetingRoom('test2');
        $meetingRoom->reserve($timeRange);
    }
}
