<?php

use App\Models\OsExecution;
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
        $executions = OsExecution::all();

        foreach ($executions as $execution) {
            $execution->id_os = $execution->motorista->id_os;
            $execution->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
