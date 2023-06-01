<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    #Mass Assignment
    protected $fillable = ["account_number", "account_name", "current_balance", "currency_id", "active"];
   
    protected $casts = ["active" => "boolean", "current_balance" => "float"];

    public const DEFAULT_BALANCE = 0.0;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }
}
