<?php

namespace App\Listeners;

use App\Events\DepositMade;
use App\Notifications\DepositNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendDepositNotification
{

    /**
     * Handle the event.
     *
     * @param  DepositMade  $event
     * @return void
     */
    public function handle(DepositMade $event)
    {
        $account = $event->account;
        $amount = $event->amount;

        try {
            //Send Notification about Deposit
            $account->user->notify(new DepositNotification($account, $amount));
        } catch (\Exception $e) {
            report($e);
        }
    }
}
