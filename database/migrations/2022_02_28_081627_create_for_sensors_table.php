<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForSensorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('for_sensors', function (Blueprint $table) {
            $table->id();

            $table->string('sens_id')->nullable();
            $table->string('userID')->nullable();
            $table->string('act')->nullable();
            $table->string('tick')->nullable();
            $table->string('time')->nullable();

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
        Schema::dropIfExists('for_sensors');
    }
}
