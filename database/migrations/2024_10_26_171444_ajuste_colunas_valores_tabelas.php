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
        Schema::table('os_services', function (Blueprint $table) {
            $table->bigInteger('price')->change();
            $table->bigInteger('extra_price')->nullable()->change();
            $table->bigInteger('km_extra')->nullable()->change();
            $table->bigInteger('partner_cost')->nullable()->change();
            $table->bigInteger('partner_extra_time')->nullable()->change();
            $table->bigInteger('partner_extra_km')->nullable()->change();
            $table->bigInteger('employee_cost')->nullable()->change();
            $table->bigInteger('employee_extra')->nullable()->change();
        });

        Schema::table('services', function (Blueprint $table) {
            $table->bigInteger('price')->change();
            $table->bigInteger('extra_price')->nullable()->change();
            $table->bigInteger('km_extra')->nullable()->change();
            $table->bigInteger('partner_cost')->nullable()->change();
            $table->bigInteger('partner_extra_time')->nullable()->change();
            $table->bigInteger('partner_extra_km')->nullable()->change();
            $table->bigInteger('employee_cost')->nullable()->change();
            $table->bigInteger('employee_extra')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
