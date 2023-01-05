<?php

namespace App\Providers;

use App\Mail\JobFailedMail;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Queue::failing(function (JobFailed $event) {
            Mail::to('hanan@gmail.com')->queue(new JobFailedMail($event));
            // $event->connectionName
            // $event->job
            // $event->exception
        });
    }
}
