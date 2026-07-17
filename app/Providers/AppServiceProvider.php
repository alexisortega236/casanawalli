<?php

namespace App\Providers;

use App\Services\Booking\BookingProviderInterface;
use App\Services\Booking\ManualInquiryBookingProvider;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(BookingProviderInterface::class, ManualInquiryBookingProvider::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
