<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use MeetingRoomReservationModeling\MeetingRoom;

class MeetingRoomTest extends TestCase
{
    public function testReserve()
    {
        $meetingRoom = new MeetingRoom();
        $meetingRoom->reserve();
        $this->assertTrue(true);
    }
}