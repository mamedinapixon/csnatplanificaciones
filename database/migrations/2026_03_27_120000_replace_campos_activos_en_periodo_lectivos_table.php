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
        Schema::table('periodo_lectivos', function (Blueprint $table) {
            $table->dateTime('fecha_inicio_carga_planificaciones')->nullable()->after('periodo_academico_id');
            $table->dateTime('fecha_fin_carga_planificaciones')->nullable()->after('fecha_inicio_carga_planificaciones');
            $table->dateTime('fecha_inicio_carga_memorias')->nullable()->after('fecha_fin_carga_planificaciones');
            $table->dateTime('fecha_fin_carga_memorias')->nullable()->after('fecha_inicio_carga_memorias');
        });

        Schema::table('periodo_lectivos', function (Blueprint $table) {
            $table->dropColumn(['fecha_inicio_activo', 'fecha_fin_activo']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('periodo_lectivos', function (Blueprint $table) {
            $table->dateTime('fecha_inicio_activo')->nullable()->after('periodo_academico_id');
            $table->dateTime('fecha_fin_activo')->nullable()->after('fecha_inicio_activo');
        });

        Schema::table('periodo_lectivos', function (Blueprint $table) {
            $table->dropColumn([
                'fecha_inicio_carga_planificaciones',
                'fecha_fin_carga_planificaciones',
                'fecha_inicio_carga_memorias',
                'fecha_fin_carga_memorias',
            ]);
        });
    }
};
