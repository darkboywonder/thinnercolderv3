<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtworkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artwork', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('method');
            $table->string('dimensions');
            $table->string('thickness');
            $table->string('year');
            $table->string('canvas_number');
            $table->string('location');
            $table->boolean('is_visible');
            $table->boolean('is_sellable');
            $table->string('template');
            $table->string('image');
            $table->string('image_hi_res');
            $table->string('image_thumb');
            $table->string('color');
            $table->string('slug');
            $table->boolean('is_featured');
            $table->integer('order')->nullable();
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
        Schema::dropIfExists('artwork');
    }
}
