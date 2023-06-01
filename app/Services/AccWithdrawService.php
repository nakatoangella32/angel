<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\TransactionType;
use App\Traits\AccountHelper;
use App\Events\WithdrawalMade;

class AccWithdrawService
{
    use AccountHelper;


    public function __construct()
    {
        $this->account = $this->getLoggedInUserAccount();
    }

    public function withdraw($amount)
    {
        try {
            $this->checkFunds($this->account, $amount);

            $this->cashOut($this->account, $amount);

            #Get Withdraw Transaction TYpe
            $tran_type = $this->getWithdrawTransactionType();

            $tran_details = [
                'datetime' => Carbon::now(), 'status' => "SUCCESS",
                'reference' => $this->generateReference(), 'place' => "", 'amount' => $amount,
                'narrative' => ($tran_type->name ?? '')
            ];

            $this->recordTransactionTrace($this->account, $tran_type, $tran_details);

            #event(new WithdrawalMade($this->account, $amount)); #Uncomment if your email config is set up well
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    private function cashOut($account, $amount)
    {
        try {
            $current_balance = $account->current_balance;
            $new_balance = ($current_balance - $amount);
            $account->current_balance = $new_balance;
            $account->save();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }


    private function getWithdrawTransactionType()
    {
        $transaction_type = TransactionType::firstOrCreate(
            ['name' =>  TransactionType::DEFAULT_TRAN_WITHRAW_TYPE],
            ['code' =>  TransactionType::DEFAULT_TRAN_WITHRAW_TYPE]
        );
        return $transaction_type;
    }
}
