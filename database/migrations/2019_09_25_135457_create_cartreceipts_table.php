<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartreceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartreceipts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('owner_id');
            $table->unsignedBigInteger('booking_id');
            $table->timestamp('receipt_date');
            $table->string('payee');
            $table->integer('receipt_no')->unique();
            $table->string('description');
            $table->string('amount');
            $table->string('source')->default('CartCash');
            $table->timestamps();
            $table->foreign('owner_id')->references('id')
                        ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cartreceipts');
    }
}
