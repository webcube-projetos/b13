<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('os_service_days', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_os_service');
            $table->unsignedBigInteger('id_vehicle');
            $table->unsignedBigInteger('id_employee');
            $table->date('date');
            $table->time('start')->nullable();
            $table->time('finish')->nullable();
            $table->integer('km_start')->nullable();
            $table->integer('km_finish')->nullable();
            $table->float('toll')->nullable();
            $table->float('parking')->nullable();
            $table->timestamps();

            $table->foreign('id_os_service')->references('id')->on('os_services');
            $table->foreign('id_vehicle')->references('id')->on('vehicles');
            $table->foreign('id_employee')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('os_service_days');
    }
};
