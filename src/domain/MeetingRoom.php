<?php declare(strict_types=1);

namespace MeetingRoomReservationModeling;

class MeetingRoom
{
    private $name;

    private static $reservations = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function reserve(TimeRange $range)
    {
        self::addReservation($this, $range);
    }

    public static function addReservation(self $room, TimeRange $range)
    {
        if (self::existsOverlappedReservation($room, $range)) {
            throw new \RuntimeException();
        }

        $key = $room->name;
        if (!isset(self::$reservations[$key])) {
            self::$reservations[$key] = [];
        }
        self::$reservations[$key][] = ['room' => $room, 'range' => $range];
    }

    public static function existsOverlappedReservation(MeetingRoom $room, TimeRange $range): bool
    {
        if (!isset(self::$reservations[$room->name])) {
            return false;
        }
        foreach (self::$reservations[$room->name] as $reservation) {
            /** @var TimeRange $reservation['range'] */
            if ($reservation['range']->overlapped($range)) {
                return true;
            }
        }
        return false;
    }
}
