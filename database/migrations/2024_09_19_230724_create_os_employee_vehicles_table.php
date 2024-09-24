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

        Schema::create('os_employee_vehicles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_os');
            $table->unsignedBigInteger('id_service_os');
            $table->unsignedBigInteger('id_employee');
            $table->unsignedBigInteger('id_company')->nullable();
            $table->unsignedBigInteger('id_vehicle')->nullable();
            $table->unsignedBigInteger('language')->nullable();
            $table->unsignedBigInteger('speciality')->nullable();
            $table->date('start');
            $table->date('end');
            $table->timestamps();

            $table->foreign('id_os')->references('id')->on('os');
            $table->foreign('id_service_os')->references('id')->on('os_services');
            $table->foreign('id_employee')->references('id')->on('employees');
            $table->foreign('id_company')->references('id')->on('companies');
            $table->foreign('id_vehicle')->references('id')->on('vehicles');
            $table->foreign('speciality')->references('id')->on('specializations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('os_employee_vehicles');
    }
};
