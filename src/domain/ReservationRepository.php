<?php declare(strict_types=1);

namespace MeetingRoomReservationModeling;

class ReservationRepository
{
    private $reservations = [];

    public function addReservation(Reservation $reservation)
    {
        if ($this->existsOverlappedReservation($reservation)) {
            throw new \RuntimeException();
        }

        $key = $reservation->room->name;
        if (!isset($this->reservations[$key])) {
            $this->reservations[$key] = [];
        }
        $this->reservations[$key][] = $reservation;
    }

    public function existsOverlappedReservation(Reservation $reservation): bool
    {
        if (!isset($this->reservations[$reservation->room->name])) {
            return false;
        }
        foreach ($this->reservations[$reservation->room->name] as $aReservation) {
            /** @var Reservation $aReservation */
            if ($aReservation->range->overlapped($reservation->range)) {
                return true;
            }
        }
        return false;
    }

}