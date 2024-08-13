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
            $table->unsignedInteger('passengers')->after('modelo_veiculo')->nullable();
            $table->unsignedInteger('bags')->after('passengers')->nullable();
            $table->string('discount_type')->after('finish')->nullable();
            $table->integer('discount')->after('discount_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropColumns('os_services', ['passengers', 'bags', 'discount_type', 'discount']);
    }
};
