<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitizensTable extends Migration
{
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up()
	{
		Schema::create('citizens', function (Blueprint $table) {
			$table->increments('id');
			$table->string('identification_number', 20)->indexed();
			$table->string('name', 100);
			$table->string('address', 500);
			$table->string('postcode', 10);
			$table->string('city', 50);
			$table->string('state', 50);
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
		Schema::dropIfExists('citizens');
	}
}
