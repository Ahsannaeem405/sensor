<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSensorDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensor_details', function (Blueprint $table) {
            $table->id();
            // $table->bigInteger('sensor_id')->nullable();
            // $table->string('sensor_id')->nullable();
            $table->foreignId('sensor_id')->constrained('sensors')->onUpdate('cascade')->onDelete('cascade');
            $table->string('temp')->nullable();
            $table->string('time')->nullable();
            $table->string('Date')->nullable();
            $table->string('Clock')->nullable();
            $table->string('status')->nullable();
            $table->string('search_time')->nullable();

            // $table->foreign('sensor_id')->references('id')->on('sensors')->onDelete('cascade');





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
        Schema::dropIfExists('sensor_details');
    }
}
