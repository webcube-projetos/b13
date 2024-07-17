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
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_os_service_days');
            $table->foreign('id_os_service_days')->references('id')->on('os_service_days');
            $table->string('location');
            $table->string('destination', 100)->nullable();
            $table->string('fligth_number', 100)->nullable();
            $table->string('assistant', 100)->nullable();
            $table->string('whatsapp_assistant', 100)->nullable();
            $table->string('passenger_list', 255)->nullable();
            $table->text('obs')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routes');
    }
};
