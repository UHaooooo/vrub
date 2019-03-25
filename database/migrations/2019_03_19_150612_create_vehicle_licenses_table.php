<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_licenses', function (Blueprint $table) {
			$table->increments('id');
			$table->date('commencement_date');
			$table->date('expiry_date');
			$table->double('amount_paid');
			$table->string('status');
			$table->unsignedInteger('vehicle_id');
			$table->timestamps();
			
			$table->foreign('vehicle_id')->references('id')->on('vehicles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicle_licenses');
    }
}
