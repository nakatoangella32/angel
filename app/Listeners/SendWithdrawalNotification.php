<?php

namespace App\Listeners;

use App\Events\WithdrawalMade;
use App\Notifications\WithdrawalNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendWithdrawalNotification
{

    /**
     * Handle the event.
     *
     * @param  WithdrawalMade  $event
     * @return void
     */
    public function handle(WithdrawalMade $event)
    {
        $account = $event->account;
        $amount = $event->amount;

        try {
            //Send Notification about Withdrawal
            $account->user->notify(new WithdrawalNotification($account, $amount));
        } catch (\Exception $e) {
            report($e);
        }
    }
}
