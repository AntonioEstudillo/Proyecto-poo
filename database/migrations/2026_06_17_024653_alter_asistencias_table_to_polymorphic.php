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
        Schema::table('asistencias', function (Blueprint $table) {
            
            $table->dropForeign(['cliente_id']);
            $table->dropColumn('cliente_id');
            $table->morphs('asistible');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('asistencias', function (Blueprint $table) {
            $table->dropMorphs('asistible');
            $table->foreignId('cliente_id')->constrained();
        });
    }
};
