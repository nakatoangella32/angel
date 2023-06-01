<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory, SoftDeletes;

    #Mass Assignment
    protected $fillable = ["name", "code", "active"];

    protected $casts = ["active" => "boolean"];

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }
}
