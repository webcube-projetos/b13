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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_type');
            $table->foreign('id_type')->references('id')->on('vehicles_types');

            $table->unsignedBigInteger('id_company');
            $table->foreign('id_company')->references('id')->on('companies');

            $table->unsignedBigInteger('id_category');
            $table->foreign('id_category')->references('id')->on('category_types');

            $table->unsignedBigInteger('id_brand');
            $table->foreign('id_brand')->references('id')->on('vehicle_brands');

            $table->string('model', 50);
            $table->string('color', 30)->nullable();
            $table->integer('year')->nullable();
            $table->boolean('armored');
            $table->integer('passengers')->nullable();
            $table->integer('bags')->nullable();

            $table->date('expiration_date')->nullable();
            $table->string('plate', 8)->nullable();
            $table->date('insurance')->nullable();
            $table->string('photo', 255)->nullable();
            $table->string('doc_photo', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
