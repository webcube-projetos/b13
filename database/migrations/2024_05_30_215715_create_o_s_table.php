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
        Schema::create('os', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_client');
            $table->unsignedBigInteger('id_contact')->nullable();
            $table->unsignedBigInteger('id_payment_method')->nullable();
            $table->integer('additional_cost')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();

            $table->foreign('id_client')->references('id')->on('clients');
            $table->foreign('id_contact')->references('id')->on('contacts');
            $table->foreign('id_payment_method')->references('id')->on('payment_methods');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('o_s');
    }
};
