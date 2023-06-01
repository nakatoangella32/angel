<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Account;
use App\Events\DepositMade;
use App\Models\TransactionType;
use App\Notifications\UserRegistered;
use App\Traits\AccountHelper;

class AccDepositService
{
    use AccountHelper;


    public function __construct()
    {
        $this->account = $this->getLoggedInUserAccount();
    }

    public function deposit($amount)
    {
        try {
            $this->validateDeposit($amount);
            #event(new DepositMade($this->account, $amount)); #Uncomment if your email config is set up well
            $this->makeDeposit($this->account, $amount);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }


    private function makeDeposit($account, $amount)
    {
        try {
            \DB::beginTransaction();

            $this->saveToAccount($account, $amount);
            #Get Deposit Transaction Type
            $tran_type = $this->getDepositTransactionType();
            $tran_details = [
                'datetime' => Carbon::now(), 'status' => "SUCCESS",
                'reference' => $this->generateReference(), 'place' => "", 'amount' => $amount, 'narrative' => ($tran_type->name ?? '')
            ];

            #Record the trasnaction Details
            $this->recordTransactionTrace($account, $tran_type, $tran_details);

            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();
            throw new \Exception($e->getMessage());
        }
    }

    private function getDepositTransactionType()
    {
        $transaction_type = TransactionType::firstOrCreate(
            ['name' =>  TransactionType::DEFAULT_TRAN_DEPOSIT_TYPE],
            ['code' =>  TransactionType::DEFAULT_TRAN_DEPOSIT_TYPE]
        );
        return $transaction_type;
    }

    private function saveToAccount($account, $amount)
    {
        $current_balance = $account->current_balance;
        $new_balance = ($current_balance + $amount);
        $account->current_balance = $new_balance;
        $account->save();
    }
}
