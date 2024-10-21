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
        Schema::table('financial', function (Blueprint $table) {
            $table->dropForeign(['id_os_service']);

            $table->dropColumn('id_os_service');
            
            $table->dropColumn('type_transaction');

            $table->renameColumn('quote', 'status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('financial', function (Blueprint $table) {
            $table->unsignedBigInteger('id_os_service');

            $table->string('type_transaction');

            $table->renameColumn('status', 'quote');
        });
    }
};
