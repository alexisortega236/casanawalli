<?php

namespace App\Services\Booking;

use App\Models\AvailabilityRequest;
use App\Models\Room;

class ExternalUrlBookingProvider extends ManualInquiryBookingProvider
{
    public function getRoomUrl(Room $room, string $locale): ?string
    {
        return $room->booking_url ?: parent::getRoomUrl($room, $locale);
    }

    public function createInquiry(array $data): AvailabilityRequest
    {
        return AvailabilityRequest::query()->create($data);
    }
}
