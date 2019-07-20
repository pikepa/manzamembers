<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('membership_id');
            $table->text('surname');
            $table->text('firstname');
            $table->text('mobile');
            $table->text('email');
            $table->text('gender')->nullable();
            $table->text('nationality')->nullable();
            $table->text('occupation')->nullable();
            $table->timestamps();
            $table->foreign('membership_id')->references('id')->on('memberships')
                                            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
