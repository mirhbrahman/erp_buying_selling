<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserBankInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_bank_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bank_name');
            $table->string('account_name');
            $table->string('account_number');
            $table->string('iban_number');
            $table->string('swift_code');
            $table->text('bank_address');
            $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_bank_infos');
    }
}
