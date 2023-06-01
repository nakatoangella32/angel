<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * datetime, status, reference, place, amount, account_to, narrative
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("transaction_type_id")->nullable();
            $table->unsignedBigInteger("account_id");
            $table->datetime("datetime")->nullable();
            $table->string("status")->default("RECIEVED");
            $table->string("reference");
            $table->string("place")->nullable();
            $table->decimal("amount", 15,2);
            $table->string("account_to")->nullable();
            $table->string("narrative")->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign("transaction_type_id")->references("id")->on("transaction_types");
            $table->foreign("account_id")->references("id")->on("accounts");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
