<?php declare(strict_types=1);

namespace MeetingRoomReservationModeling\Test;

use MeetingRoomReservationModeling\Time;
use MeetingRoomReservationModeling\TimeRange;
use PHPUnit\Framework\TestCase;

class TimeRangeTest extends TestCase
{
    /**
     * @param TimeRange $range1
     * @param TimeRange $range2
     * @param bool $expected
     * @dataProvider dataOverlapped
     */
    public function testOverlapped(TimeRange $range1, TimeRange $range2, bool $expected)
    {
        $actual = $range1->overlapped($range2);

        $this->assertSame($expected, $actual);
    }

    public function dataOverlapped()
    {
        return [
            'overlapped,start after, end before' => [
                'range1' => new TimeRange(new Time('12:00'), new Time('15:00')),
                'range2' => new TimeRange(new Time('14:00'), new Time('15:00')),
                'expected' => true,
            ],
            'overlapped,start before, end before' => [
                'range1' => new TimeRange(new Time('12:00'), new Time('15:00')),
                'range2' => new TimeRange(new Time('11:00'), new Time('12:30')),
                'expected' => true,
            ],
            'overlapped,start after,end after' => [
                'range1' => new TimeRange(new Time('12:00'), new Time('15:00')),
                'range2' => new TimeRange(new Time('14:00'), new Time('15:30')),
                'expected' => true,
            ],
            'overlapped,start before, end after' => [
                'range1' => new TimeRange(new Time('12:00'), new Time('15:00')),
                'range2' => new TimeRange(new Time('11:00'), new Time('15:30')),
                'expected' => true,
            ],
            'not overlapped' => [
                'range1' => new TimeRange(new Time('12:00'), new Time('15:00')),
                'range2' => new TimeRange(new Time('15:00'), new Time('15:30')),
                'expected' => false,
            ]
        ];
    }
}
