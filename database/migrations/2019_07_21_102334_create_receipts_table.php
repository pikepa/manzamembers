<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('membership_id');
            $table->unsignedBigInteger('owner_id');
            $table->timestamp('date');
            $table->string('payee');
            $table->integer('receipt_no')->unique();
            $table->unsignedBigInteger('mship_term_id')->nullable();
            $table->string('amount');
            $table->string('source')->default('Manual');
            $table->timestamps();
            $table->foreign('membership_id')->references('id')
                        ->on('memberships')->onDelete('cascade');
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
        Schema::dropIfExists('receipts');
    }
}
