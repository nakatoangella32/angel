<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ["datetime", "status", "reference", "place", "amount", "account_to", "narrative"];

    public function transactionType()
    {
        return $this->belongsTo(TransactionType::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
