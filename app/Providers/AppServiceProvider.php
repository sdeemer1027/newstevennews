<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        // Share the QR code across all views
        View::composer('*', function ($view) {
            $qrCode = QrCode::size(100)->generate('https://steven.news'); // You can change the URL as needed
            $view->with('qrCode', $qrCode);
        });
    }
}
