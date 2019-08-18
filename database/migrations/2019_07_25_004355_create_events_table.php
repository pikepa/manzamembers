<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('featured_img')->nullable();
            $table->text('title');
            $table->text('description');
            $table->text('venue');
            $table->text('v_address');
            $table->text('bookings_only')->nullable();
            $table->text('add_info')->nullable();    
            $table->date('date');
            $table->string('timing');
            $table->string('status');
            $table->timestamp('published_at')->nullable();
            $table->integer('owner_id')->unsigned()->default(1);
            $table->softDeletes();
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
        Schema::dropIfExists('events');
    }
}
