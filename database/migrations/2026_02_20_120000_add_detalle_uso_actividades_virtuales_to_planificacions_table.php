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
        Schema::table('planificacions', function (Blueprint $table) {
            $table->text('detalle_uso_actividades_virtuales')
                ->nullable()
                ->after('doc_invitados_detalles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('planificacions', function (Blueprint $table) {
            $table->dropColumn('detalle_uso_actividades_virtuales');
        });
    }
};
