<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriceitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('priceitems', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('price_type_id')->unsigned();
            $table->integer('event_id')->unsigned();
            $table->integer('memb')->unsigned();
            $table->integer('price')->unsigned();
          //  $table->unique(['price_type_id', 'event_id']);
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
        Schema::dropIfExists('priceitems');
    }
}
