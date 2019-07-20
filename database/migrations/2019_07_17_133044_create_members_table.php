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
            $table->string('surname');
            $table->string('firstname');
            $table->string('mobile');
            $table->string('email');
            $table->string('gender');
            $table->string('nationality');
            $table->string('occupation')->nullable();
            $table->string('company')->nullable();
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
