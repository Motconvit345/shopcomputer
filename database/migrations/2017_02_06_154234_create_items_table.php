<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->index()->unsigned();
            $table->string('name');
            $table->string('alias')->nullable();
            $table->decimal('price', 10, 2);
            $table->double('sale', 5, 2)->nullable();
            $table->string('avatar')->nullable();
            $table->text('detail')->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('guarantee')->unsigned()->nullable();
            $table->string('made')->nullable();
            $table->string('producer', 50)->nullable();
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
        Schema::dropIfExists('items');
    }
}
