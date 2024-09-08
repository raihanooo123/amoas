<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('booking_info', function (Blueprint $table) {
            $table->string('state')->nullable()->after('address')->index();
            $table->string('city')->nullable()->after('address')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('booking_info', function (Blueprint $table) {
            $table->dropColumn('state');
            $table->dropColumn('city');
        });
    }
};
