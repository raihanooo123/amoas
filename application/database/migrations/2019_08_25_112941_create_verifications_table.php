<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVerificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verifications', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('department_id');
            $table->string('name', 191)->index();
            $table->string('last_name', 191)->index();
            $table->string('father_name', 191)->index();
            $table->string('grand_father_name', 191)->index();
            $table->string('birth_place')->nullable();
            $table->string('marital_status')->nullable();
            $table->tinyInteger('living_duration')->nullable();
            $table->tinyInteger('living_duration_unit')->nullable();
            $table->date('last_trip')->nullable();
            $table->unsignedInteger('service_id');
            $table->unsignedInteger('province_id');
            $table->unsignedInteger('district_id');
            $table->unsignedInteger('village_id');
            $table->string('curent_city', 191)->index()->nullable();
            $table->string('curent_state', 191)->index()->nullable();
            $table->string('curent_country', 191)->index()->nullable();
            $table->smallInteger('height')->nullable();
            $table->string('eyes_color')->nullable();
            $table->string('skin_color')->nullable();
            $table->string('hair_color')->nullable();
            $table->string('other_info')->nullable();
            $table->string('delagate_name')->nullable();
            $table->string('delagate_contact')->nullable();
            $table->string('d_name', 191)->index();
            $table->string('d_father_name', 191)->index();
            $table->string('d_grand_father_name', 191)->index();
            $table->string('d_sibling_id')->nullable();
            $table->string('d_tazkira_issue_date')->nullable();
            $table->string('d_page_no')->nullable();
            $table->string('d_record_no')->nullable();
            $table->string('d_version_no')->nullable();
            $table->timestamps();
        });

        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 191)->index();
            $table->string('label_en')->nuallable();
            $table->string('label_dr');

        });

        Schema::create('provices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 191)->index();
            $table->string('label_en')->nuallable();
            $table->string('label_dr');
        });

        Schema::create('district', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 191)->index();
            $table->string('label_en')->nuallable();
            $table->string('label_dr');
        });

        Schema::create('village', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 191)->index();
            $table->string('label_en')->nuallable();
            $table->string('label_dr');
        });

        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('contactable_id');
            $table->string('contactable_type', 191)->index();
            $table->string('contact');
            $table->string('type');
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
        Schema::dropIfExists('verifications');
        Schema::dropIfExists('services');
        Schema::dropIfExists('provices');
        Schema::dropIfExists('district');
        Schema::dropIfExists('village');
        Schema::dropIfExists('contacts');
    }
}
