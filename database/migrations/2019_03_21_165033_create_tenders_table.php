<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('registration_number_id');
            $table->unsignedInteger('tender_session_id');
            $table->unsignedInteger('citizen_id');
            $table->double("tender_amount");
            $table->double("paid_amount");
            $table->string("status", 50);
            $table->date("tender_date");
            $table->date("tender_success_date");
            $table->date("expiry_date");
            $table->timestamps();

            $table->foreign('registration_number_id')->references('id')->on('vehicle_registration_numbers');
            $table->foreign('tender_session_id')->references('id')->on('tender_sessions');
            $table->foreign('citizen_id')->references('id')->on('citizens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenders');
    }
}
