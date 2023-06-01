<?php

namespace App\Services;

use App\Models\User;
use App\Models\Account;
use App\Notifications\UserRegistered;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function __construct()
    {
        $this->users = new User();
    }

    public function register($request)
    {
        try {
            \DB::beginTransaction();
            $user =  $this->users->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' =>Hash::make($request->password)
            ]);

            //Create & Initiliaze Account if this user has none
            if (!$user->account) {
                $user->account()->create([
                    'current_balance' => Account::DEFAULT_BALANCE,
                    'account_name' => $user->name, 'account_number' => \Str::random(5),
                    'currency_id' => $request->currency
                ]);
            }

            //Send out out some email/Notification
            #$user->notify(new UserRegistered()); #Uncomment if your email config is set up well

            #Login the user if all is well
            auth()->login($user);

            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();
            throw new \Exception($e->getmessage());
        }
    }
}
