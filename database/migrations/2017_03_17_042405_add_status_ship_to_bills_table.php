<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusShipToBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bills', function (Blueprint $table) {
            $table->string('status_ship', 10)->nullable();
            $table->integer('user_ship')->unsigned()->nullable();
            $table->integer('user_sell')->unsigned()->nullable();
            $table->renameColumn('status', 'status_payment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bills', function (Blueprint $table) {
            $table->renameColumn('status_payment', 'status');
            $table->dropColumn(['status_ship', 'user_ship']);
        });
    }
}
