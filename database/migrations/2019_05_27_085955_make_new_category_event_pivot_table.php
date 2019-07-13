<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeNewCategoryEventPivotTable extends Migration
{
    public function up()
    {
        Schema::create('category_event', function (Blueprint $table) {
            $table->integer('category_id')->unsigned();
            $table->integer('event_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('category_event', function (Blueprint $table) {
            Schema::dropIfExists('category_product');
        });
    }
}
