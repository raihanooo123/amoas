<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClearanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clearance', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date')->index();
            $table->unsignedInteger('receiver_account')->index();
            $table->unsignedInteger('deliver_account')->index();
            $table->date('clear_from')->index();
            $table->date('clear_to')->index();
            $table->unsignedInteger('registrar_id');
            $table->text('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clearance');
    }
}
