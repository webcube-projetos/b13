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
        Schema::dropIfExists('financial_itens');
        Schema::create('financial_itens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_os');
            $table->unsignedBigInteger('id_execution')->nullable();
            $table->unsignedBigInteger('id_client')->nullable();
            $table->unsignedBigInteger('id_employee')->nullable();
            $table->unsignedBigInteger('id_company')->nullable();
            $table->unsignedBigInteger('total');
            $table->timestamps();

            $table->foreign('id_os')->references('id')->on('os');
            $table->foreign('id_execution')->references('id')->on('os_executions');
            $table->foreign('id_client')->references('id')->on('clients');
            $table->foreign('id_employee')->references('id')->on('employees');
            $table->foreign('id_company')->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tables_financial_itens');
    }
};
