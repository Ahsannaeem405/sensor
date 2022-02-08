<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSensorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensors', function (Blueprint $table) {
            $table->id();
            $table->string('Sensor_Location')->nullable();
            $table->string('Sensor_IP')->nullable();
            $table->string('Sensor_Subnet')->nullable();
            $table->string('Sensor_GW')->nullable();
            $table->string('Sensor_DNS1')->nullable();
            $table->string('Sensor_MAC')->nullable();
            $table->string('Sensor_Status')->nullable();
            $table->string('Sensor_Restart')->nullable();
            $table->string('act')->nullable();
            $table->string('tick')->nullable();
            $table->string('linetick')->nullable();
            $table->string('user_id')->nullable();
            $table->string('admin_id')->nullable();
            $table->string('typee')->nullable();
            $table->string('user_side')->nullable();
            $table->string('admin_side')->nullable();
            $table->string('check_id')->nullable();
            $table->string('chart_id')->nullable();
            $table->string('chart_adminid')->nullable();



















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
        Schema::dropIfExists('sensors');
    }
}
