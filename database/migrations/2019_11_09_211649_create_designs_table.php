<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignsTable extends Migration
{
    public function up()
    {
        Schema::create('designs', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('is_visible');
            $table->boolean('is_featured');
            $table->string('name');
            $table->string('client');
            $table->string('type');
            $table->string('category');
            $table->string('template');
            $table->string('image');
            $table->string('image_thumb');
            $table->text('credit');
            $table->string('color');
            $table->string('slug');
            $table->integer('order');
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
        Schema::dropIfExists('designs');
    }
}
