<?php

namespace App\Services\Booking;

use App\Models\AvailabilityRequest;
use App\Models\Room;

interface BookingProviderInterface
{
    public function getAvailability(array $criteria): array;

    public function getRoomUrl(Room $room, string $locale): ?string;

    public function createInquiry(array $data): AvailabilityRequest;
}
