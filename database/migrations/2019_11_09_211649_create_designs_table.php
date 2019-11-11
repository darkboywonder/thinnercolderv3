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
            $table->boolean('is_visible')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->string('name');
            $table->string('client')->nullable();
            $table->string('type')->nullable();
            $table->string('category')->nullable();
            $table->string('template');
            $table->string('image')->nullable();
            $table->string('image_thumb')->nullable();
            $table->text('credit')->nullable();
            $table->string('color')->nullable();
            $table->string('slug')->unique();
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
        Schema::dropIfExists('designs');
    }
}
