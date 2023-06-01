<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->unsignedInteger("currency_id")->nullable();
            $table->string("account_name");
            $table->string("account_number");
            $table->decimal("current_balance", 15, 2);
            $table->boolean("active")->default(true);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign("currency_id")->references("id")->on("currencies");
            $table->foreign("user_id")->on("users")->references("id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
