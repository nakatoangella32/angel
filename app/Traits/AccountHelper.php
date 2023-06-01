<?php

namespace App\Traits;

use App\Models\Account;
use App\Models\Currency;
use App\Models\TransactionType;

trait AccountHelper
{
    private function checkFunds(Account $account, $amount)
    {
        $current_balance = $account->current_balance;
        if ($current_balance < $amount) {
            throw new \Exception('Insufficient Funds');
        }
    }

    private function validateDeposit($amount)
    {
        if ($amount <= 0) {
            throw new \Exception('Invalid amount');
        }
    }

    private function getDefaultCurrency()
    {
        #Return UGX as the default currency
        return Currency::where("code", "UGX")->first();
    }

    private function getLoggedInUserAccount()
    {
        try {
            $user = auth()->user();
            return $user->account;
        } catch (\Exception $e) {
            throw new  \Exception($e->getMessage());
        }
    }

    private function generateReference()
    {
        #Generate a random str of length 10
        return \Str::random(5);
    }

    private function recordTransactionTrace(Account $account, TransactionType $type, $tran_details)
    {
        try {
            $transaction = $account->transactions()->create($tran_details);
            $transaction->transactionType()->associate($type);
            $transaction->save();
        } catch (\Exception $e) {
            throw new  \Exception($e->getMessage());
        }
    }
}
