<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('os_services', function (Blueprint $table) {
            $table->integer('qtd_service')->after('qtd_days');
            $table->string('modelo_veiculo', 50)->after('qtd_service')->nullable(); 
            $table->boolean('similar')->after('modelo_veiculo')->default(false); 
        });
    }

    public function down()
    {
        Schema::table('os_services', function (Blueprint $table) {
            $table->dropColumn('qtd_service');
            $table->dropColumn('modelo_veiculo');
            $table->dropColumn('similar');
        });
    }
};
