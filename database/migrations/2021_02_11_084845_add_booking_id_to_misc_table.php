<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBookingIdToMiscTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('traceable_miscellaneous', function (Blueprint $table) {
            $table->unsignedBigInteger('booking_id')->index()->nullable()->after('department_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('traceable_miscellaneous', function (Blueprint $table) {
            $table->dropColumn('booking_id');
        });
    }
}
