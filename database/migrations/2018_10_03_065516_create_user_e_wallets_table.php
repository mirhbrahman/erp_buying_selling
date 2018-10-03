<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserEWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_e_wallets', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('e_wallet_id')->unsigned();

            $table->foreign('e_wallet_id')->references('id')->on('e_wallets')->onDelete('cascade');

            $table->string('ewallet_number');

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
        Schema::dropIfExists('user_e_wallets');
    }
}
