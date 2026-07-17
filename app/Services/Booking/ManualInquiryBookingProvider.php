<?php

namespace App\Services\Booking;

use App\Models\AvailabilityRequest;
use App\Models\Room;

class ManualInquiryBookingProvider implements BookingProviderInterface
{
    public function getAvailability(array $criteria): array
    {
        return [
            'status' => 'manual_review',
            'message' => 'Availability is confirmed manually by Casa Nawalli.',
            'criteria' => $criteria,
        ];
    }

    public function getRoomUrl(Room $room, string $locale): ?string
    {
        return route('public.availability', ['locale' => $locale, 'room' => $room->slug]);
    }

    public function createInquiry(array $data): AvailabilityRequest
    {
        return AvailabilityRequest::query()->create($data);
    }
}
