<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up()
	{
		Schema::create('vehicles', function (Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('registration_number_id');
			$table->string('engine_number', 50);
			$table->string('chassis_number', 50);
			$table->integer('production_year');
			$table->string('original_status', 10);
			$table->double('engine_capacity');
			$table->integer('number_of_seat');
			$table->string('color', 50);
			$table->integer('fuel_type');
			$table->string('purpose', 500);
			$table->string('brand', 100);
			$table->string('model', 100);
			$table->string('vehicle_type', 100);
			$table->double('laden_weight');
			$table->double('unladen_weight');
			$table->double('curb_weight');
			$table->timestamps();

			$table->foreign('registration_number_id')->references('id')->on('vehicle_registration_numbers');
		});
	}
	
	/**
	* Reverse the migrations.
	*
	* @return void
	*/
	public function down()
	{
		Schema::dropIfExists('vehicles');
	}
}
