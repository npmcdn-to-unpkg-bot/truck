<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrucksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trucks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('surname');
            $table->string('email');
            $table->string('tel');
            $table->string('truck_manufacture_date');
            $table->string('truck_model');
            $table->string('truck_maker');
            $table->integer('truck_tons');
            $table->string('truck_plate');
            $table->string('truck_plate_state');
            $table->string('truck_password')->nullable();
            $table->boolean('truck_suspend')->nullable();
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
        Schema::drop('trucks');
    }
}
