<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMessageToBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
  /*      Schema::table('bills', function (Blueprint $table) {
            $table->text('message')->nullable();
            $table->text('payment_info')->nullable();
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
/*        Schema::table('bills', function (Blueprint $table) {
            $table->dropColumn(['message', 'payment_info']);
        });*/
    }
}
