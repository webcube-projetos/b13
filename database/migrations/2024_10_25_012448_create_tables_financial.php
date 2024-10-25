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
        Schema::dropIfExists('financial');
        Schema::create('financial', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_os');
            $table->unsignedBigInteger('id_client')->nullable();
            $table->unsignedBigInteger('id_employee')->nullable();
            $table->unsignedBigInteger('id_company')->nullable();
            $table->unsignedInteger('installment');
            $table->boolean('status')->default(0);
            $table->tinyInteger('type_transaction');
            $table->date('date');
            $table->unsignedBigInteger('total');
            $table->timestamps();

            $table->foreign('id_os')->references('id')->on('os');
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
        Schema::dropIfExists('tables_financial');
    }
};
