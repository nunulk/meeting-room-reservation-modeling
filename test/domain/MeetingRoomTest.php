<?php declare(strict_types=1);

namespace MeetingRoomReservationModeling\Test;

use MeetingRoomReservationModeling\ReservationRepository;
use PHPUnit\Framework\TestCase;
use MeetingRoomReservationModeling\MeetingRoom;
use MeetingRoomReservationModeling\Time;
use MeetingRoomReservationModeling\TimeRange;

class MeetingRoomTest extends TestCase
{
    public function testReserve()
    {
        $timeRange = new TimeRange(new Time('12:00'), new Time('15:00'));

        $repository = new ReservationRepository();
        $meetingRoom = new MeetingRoom('test');
        $reservation = $meetingRoom->reserve($timeRange);
        $repository->addReservation($reservation);

        $this->assertTrue(true);
    }

    public function testCannotReserve()
    {
        $this->expectException(\RuntimeException::class);

        $repository = new ReservationRepository();

        $meetingRoom = new MeetingRoom('test');

        $timeRange1 = new TimeRange(new Time('12:00'), new Time('15:00'));

        $reservation1 = $meetingRoom->reserve($timeRange1);
        $repository->addReservation($reservation1);

        $timeRange2 = new TimeRange(new Time('14:00'), new Time('15:00'));

        $reservation2 = $meetingRoom->reserve($timeRange2);
        $repository->addReservation($reservation2);
    }
}
