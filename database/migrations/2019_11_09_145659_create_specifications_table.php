<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specifications', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('artwork_id');
            $table->foreign('artwork_id')->references('id')->on('artwork');
            $table->unsignedInteger('materials_id');
            $table->foreign('materials_id')->references('id')->on('materials');
            $table->unsignedInteger('sizes_id');
            $table->foreign('sizes_id')->references('id')->on('sizes');
            $table->decimal('price', 8, 2);
            $table->string('paypal');
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
        Schema::dropIfExists('specifications');
    }
}
