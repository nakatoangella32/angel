<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionType extends Model
{
    use HasFactory;

    public const DEFAULT_TRAN_DEPOSIT_TYPE = "DEPOSIT";
    public const DEFAULT_TRAN_WITHRAW_TYPE = "WITHDRAW";
    public const DEFAULT_TRAN_INQUIRY_TYPE = "INQUIRY";

    protected  $fillable = ["name", "code"];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
