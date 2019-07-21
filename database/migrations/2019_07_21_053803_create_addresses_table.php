<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('membership_id');
            $table->string('type');
            $table->string('addr1');
            $table->string('addr2');
            $table->string('addr3')->nullable();
            $table->string('city');
            $table->string('postcode');
            $table->string('country');
            $table->timestamps();
            $table->foreign('membership_id')->references('id')
                        ->on('memberships')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
