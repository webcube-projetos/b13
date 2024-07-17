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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('type');
            $table->string('name', 100);
            $table->string('fantasy_name', 100)->nullable();
            $table->string('nickname', 100)->nullable();
            $table->integer('document');
            $table->integer('armed');
            $table->integer('driver')->nullable();
            $table->string('phone')->nullable();
            $table->string('email', 100)->nullable();
            $table->unsignedBigInteger('id_address');
            $table->unsignedBigInteger('id_company');
            $table->unsignedBigInteger('id_contact');
            $table->unsignedBigInteger('id_bank')->nullable();
            $table->string('obs', 255)->nullable();
            $table->text('cnh', 255)->nullable();
            $table->text('cnv', 255)->nullable();
            $table->string('photo', 255)->nullable();
            $table->timestamps();

            $table->foreign('id_address')->references('id')->on('adresses');
            $table->foreign('id_company')->references('id')->on('companies');
            $table->foreign('id_contact')->references('id')->on('contacts');
            $table->foreign('id_bank')->references('id')->on('bank_accounts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
