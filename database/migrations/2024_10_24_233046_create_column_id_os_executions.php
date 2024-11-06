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
        Schema::table('os_executions', function (Blueprint $table) {
            $table->unsignedBigInteger('id_os')->after('id')->nullable();
            $table->foreign('id_os')->references('id')->on('os');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('column_id_os_executions');
    }
};
