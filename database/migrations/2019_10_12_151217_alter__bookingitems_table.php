<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterBookingitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('booking_items', function (Blueprint $table) {
            $table->integer('seats')->unsigned()->default(1)->after('qty');
        });

        Schema::table('booking_items', function (Blueprint $table) {
            $table->dropColumn('confirmed_at');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('booking_items', function (Blueprint $table) {
            $table->dropColumn('seats');
        });
    }
}
