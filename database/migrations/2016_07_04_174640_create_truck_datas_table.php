<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTruckDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('truck_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('truck_id');
            $table->integer('truck-speed');
            $table->float('truck-lat');
            $table->float('truck-lng');
            $table->boolean('truck-active');
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
        Schema::drop('truck_datas');
    }
}
