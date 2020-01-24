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
        $reservation = new Reservation($this, $range);
        return $reservation;
    }

    public static function addReservation(Reservation $reservation)
    {
        if (self::existsOverlappedReservation($reservation)) {
            throw new \RuntimeException();
        }

        $key = $reservation->room->name;
        if (!isset(self::$reservations[$key])) {
            self::$reservations[$key] = [];
        }
        self::$reservations[$key][] = $reservation;
    }

    public static function existsOverlappedReservation(Reservation $reservation): bool
    {
        if (!isset(self::$reservations[$reservation->room->name])) {
            return false;
        }
        foreach (self::$reservations[$reservation->room->name] as $aReservation) {
            /** @var Reservation $aReservation */
            if ($aReservation->range->overlapped($reservation->range)) {
                return true;
            }
        }
        return false;
    }
}
