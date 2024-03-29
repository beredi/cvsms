<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('transmission');
            $table->string('chassis_num')->nullable();
            $table->double('engine_volume')->nullable();
            $table->double('engine_power')->nullable();
            $table->integer('year')->nullable();
            $table->unsignedInteger('model_id');
            $table->foreign('model_id')->references('id')->on('vehicle_models')->onDelete('cascade');
            $table->unsignedInteger('type_id');
            $table->foreign('type_id')->references('id')->on('vehicle_types')->onDelete('cascade');
            $table->unsignedInteger('customer_id')->nullable();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
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
        Schema::dropIfExists('vehicles');
    }
}
