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
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('bank', 50)->nullable();
            $table->integer('bank_number')->nullable();
            $table->string('agency', 10)->nullable();
            $table->string('cc', 20)->nullable();
            $table->string('key_type', 30);
            $table->string('key', 255);
            $table->string('preference', 20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_accounts');
    }
};
