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
        // - id_employee_vehicle
        // - day (int) (null)
        // - identification (varchar 2) (null)
        // - date (date) 
        // - start_time (time) (null)
        // - end_time (time) (null)
        // - total_time (time) (null) 
        // - exceed_time (time) (null)
        // - km_start (int) (null)
        // - km_end (int) (null)
        // - km_total (int) (null)
        // - km_exceed (int) (null)
        // - toll (float) (null)
        // - parking (float) (null)
        // - another_expenses (float) (null)
        Schema::create('os_executions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_employee_vehicle');
            $table->unsignedInteger('day')->nullable();
            $table->string('identification', 2)->nullable();
            $table->date('date');
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->time('total_time')->nullable();
            $table->time('exceed_time')->nullable();
            $table->unsignedInteger('km_start')->nullable();
            $table->unsignedInteger('km_end')->nullable();
            $table->unsignedInteger('km_total')->nullable();
            $table->unsignedInteger('km_exceed')->nullable();
            $table->float('toll')->nullable();
            $table->float('parking')->nullable();
            $table->float('another_expenses')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('os_executions');
    }
};
