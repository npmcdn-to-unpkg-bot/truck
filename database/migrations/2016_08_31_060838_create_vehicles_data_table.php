<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vehicle_id')->index()->unsigned();
            $table->float('speed');
            $table->float('lat');
            $table->float('lng');
            $table->boolean('active');
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
        Schema::drop('vehicle_datas');
    }
}
