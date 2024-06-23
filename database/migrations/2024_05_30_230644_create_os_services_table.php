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
        Schema::create('os_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_os');
            $table->unsignedBigInteger('id_service');
            $table->integer('qtd_days');
            $table->date('start')->nullable();
            $table->date('finish')->nullable();
            $table->float('price');
            $table->integer('time')->nullable();
            $table->float('extra_price')->nullable();
            $table->integer('km')->nullable();
            $table->float('km_extra')->nullable();
            $table->float('partner_cost')->nullable();
            $table->float('partner_extra_time')->nullable();
            $table->float('partner_extra_km')->nullable();
            $table->float('employee_cost')->nullable();
            $table->float('employee_extra')->nullable();
            $table->timestamps();

            $table->foreign('id_os')->references('id')->on('os');
            $table->foreign('id_service')->references('id')->on('services');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('os_services');
    }
};
