<?php

namespace App\Notifications;

use Carbon\Carbon;
use App\Models\Account;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DepositNotification extends Notification
{
    use Queueable;

    public $account;
    public $amount;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Account $account, $amount)
    {
        $this->account = $account;
        $this->amount = $amount;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $date = Carbon::now();
        return (new MailMessage)
            ->line("Dear {$this->account->user->name},")
            ->line("Your account has been succesfully deposited {$this->amount} {$this->account->currency->code} at {$date}")
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
