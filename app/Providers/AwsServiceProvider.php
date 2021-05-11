<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\RotatingFileHandler;

class AwsServiceProvider extends ServiceProvider
{
    /**
     * Configure logging on boot.
     *
     * @return void
     */
    public function boot()
    {
        putenv("AWS_ACCESS_KEY_ID=" . env('PUBLISHER_SNS_KEY'));
        putenv("AWS_SECRET_ACCESS_KEY=" . env('PUBLISHER_SNS_SECRET'));
    }

    public function register()
    {
    }
}
