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
            $table->dropColumn(['discount_type', 'discount']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('os_services', function (Blueprint $table) {
            $table->string('discount_type')->nullable();
            $table->integer('discount')->nullable();
        });
    }
};
