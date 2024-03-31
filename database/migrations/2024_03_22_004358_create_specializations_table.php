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
        Schema::create('specializations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_ascendent')->nullable();
            $table->string('name', 50);
            $table->string('name_english', 50);
            $table->string('description', 255)->nullable();
            $table->timestamps();

            $table->foreign('id_ascendent')->references('id')->on('specializations')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('specializations');
    }
};
