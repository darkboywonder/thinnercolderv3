<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sizes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order');
            $table->string('dimension');
            $table->timestamps();
        });

        DB::table('sizes')->insert(['order' => 10, 'dimension' => 'Original']);
        DB::table('sizes')->insert(['order' => 20, 'dimension' => '7" x 14"']);
        DB::table('sizes')->insert(['order' => 30, 'dimension' => '8" x 10"']);
        DB::table('sizes')->insert(['order' => 40, 'dimension' => '10" x 20"']);
        DB::table('sizes')->insert(['order' => 50, 'dimension' => '10" x 24"']);
        DB::table('sizes')->insert(['order' => 60, 'dimension' => '11.75" x 11.75"']);
        DB::table('sizes')->insert(['order' => 70, 'dimension' => '12" x 16"']);
        DB::table('sizes')->insert(['order' => 80, 'dimension' => '12" x 16" x 4"']);
        DB::table('sizes')->insert(['order' => 90, 'dimension' => '12" x 24"']);
        DB::table('sizes')->insert(['order' => 100, 'dimension' => '15" x 24"']);
        DB::table('sizes')->insert(['order' => 110, 'dimension' => '18" x 24"']);
        DB::table('sizes')->insert(['order' => 120, 'dimension' => '18" x 36"']);
        DB::table('sizes')->insert(['order' => 130, 'dimension' => '24" x 24"']);
        DB::table('sizes')->insert(['order' => 140, 'dimension' => '24" x 30"']);
        DB::table('sizes')->insert(['order' => 150, 'dimension' => '24" x 32"']);
        DB::table('sizes')->insert(['order' => 160, 'dimension' => '30" x 48"']);
        DB::table('sizes')->insert(['order' => 170, 'dimension' => '36" x 48"']);
        DB::table('sizes')->insert(['order' => 180, 'dimension' => '36" x 72"']);
        DB::table('sizes')->insert(['order' => 190, 'dimension' => '37" x 60"']);
        DB::table('sizes')->insert(['order' => 200, 'dimension' => '5\' x 12\'']);
        DB::table('sizes')->insert(['order' => 210, 'dimension' => '10\' x 24\'']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sizes');
    }
}
