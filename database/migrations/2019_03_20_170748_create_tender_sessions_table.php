<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenderSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tender_sessions', function (Blueprint $table) {
			$table->increments('id');
			$table->string("name", 100);
			$table->date("start_date");
			$table->date("end_date");
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
        Schema::dropIfExists('tender_sessions');
    }
}
