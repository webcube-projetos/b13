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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_category_service');
            $table->unsignedBigInteger('id_category_espec');
            $table->unsignedBigInteger('id_service_type');
            $table->unsignedBigInteger('id_vehicle');

            $table->string('name', 50);
            $table->string('name_english', 50);
            $table->tinyInteger('blindado_armado');
            $table->float('price');
            $table->integer('time');
            $table->float('extra_price');
            $table->integer('km')->nullable();
            $table->float('km_extra')->nullable();
            $table->float('partner_cost')->nullable();
            $table->float('partner_extra_time')->nullable();
            $table->float('partner_extra_km')->nullable();
            $table->float('employee_cost')->nullable();
            $table->float('employee_extra')->nullable();

            $table->foreign('id_category_service')->references('id')->on('categories');
            $table->foreign('id_category_espec')->references('id')->on('categories');
            $table->foreign('id_service_type')->references('id')->on('categories');
            $table->foreign('id_vehicle')->references('id')->on('vehicles_types');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
