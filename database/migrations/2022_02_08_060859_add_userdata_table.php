<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserdataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('activation_code')->nullable();
            $table->string('addsensor')->nullable();
            $table->string('deletesensor')->nullable();
            $table->string('updatesensor')->nullable();
            $table->string('graph')->nullable();
            $table->string('search')->nullable();
            $table->string('changechart')->nullable();
            $table->string('sp')->nullable();
            $table->string('admin_id')->nullable();










        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
