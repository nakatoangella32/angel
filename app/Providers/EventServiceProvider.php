<?php

namespace App\Providers;

use App\Events\DepositMade;
use App\Events\WithdrawalMade;
use App\Listeners\SendDepositNotification;
use App\Listeners\SendWithdrawalNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        DepositMade::class => [
            SendDepositNotification::class,
        ],
        WithdrawalMade::class => [
            SendWithdrawalNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
