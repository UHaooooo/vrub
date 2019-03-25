<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleRegistrationNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_registration_numbers', function (Blueprint $table) {
			$table->increments('id');
			$table->string("registration_number", 50);
			$table->string("status", 50);
			$table->unsignedInteger("area_id")->nullable(false);
			$table->timestamps();

			$table->foreign('area_id')->references('id')->on('areas');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicle_registration_numbers');
    }
}
