<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleInsurancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_insurances', function (Blueprint $table) {
			$table->increments('id');
			$table->string('provider', 200);
			$table->integer('insurance_type');
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
        Schema::dropIfExists('vehicle_insurances');
    }
}
