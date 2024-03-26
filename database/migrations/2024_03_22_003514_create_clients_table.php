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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_address');
            $table->foreign('id_address')->references('id')->on('adresses');

            $table->unsignedBigInteger('id_contact');
            $table->foreign('id_contact')->references('id')->on('contacts');

            $table->unsignedBigInteger('id_bank')->nullable();
            $table->foreign('id_bank')->references('id')->on('bank_accounts');

            $table->integer('document');
            $table->string('name', 100);
            $table->string('fantasy_name', 100)->nullable();
            $table->string('nickname', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
