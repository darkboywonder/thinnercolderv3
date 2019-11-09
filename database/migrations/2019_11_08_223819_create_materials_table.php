<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order');
            $table->string('type');
            $table->timestamps();
        });

        DB::table('materials')->insert(['order' => 10, 'type' => 'Original']);
        DB::table('materials')->insert(['order' => 20, 'type' => 'Canvas Print']);
        DB::table('materials')->insert(['order' => 30, 'type' => 'Paper Print']);
        DB::table('materials')->insert(['order' => 40, 'type' => 'Metal Print']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materials');
    }
}
