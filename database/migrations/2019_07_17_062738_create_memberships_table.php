<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memberships', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('old_membership_no');
            $table->string('status')->default('Pending');
            $table->string('surname');
            $table->integer('mship_type_id')->unsigned()->nullable();
            $table->integer('mship_term_id')->unsigned()->nullable();
            $table->string('phone');
            $table->string('email');
            $table->timestamp('date_joined')->nullable();
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
        Schema::dropIfExists('memberships');
    }
}
