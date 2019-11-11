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
            $table->string('method')->nullable();
            $table->string('dimensions')->nullable();
            $table->string('thickness')->nullable();
            $table->string('year')->nullable();
            $table->string('canvas_number')->nullable();
            $table->string('location')->nullable();
            $table->boolean('is_visible')->default(true);
            $table->boolean('is_sellable')->default(false);
            $table->string('template');
            $table->string('image')->nullable();
            $table->string('image_hi_res')->nullable();
            $table->string('image_thumb')->nullable();
            $table->string('color')->nullable();
            $table->string('slug')->unique();
            $table->boolean('is_featured')->default(false);
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
