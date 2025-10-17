<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixUnidadesTemasTablesStructure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Recrear tabla unidades con la estructura correcta
        Schema::dropIfExists('unidades');
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('planificacion_id');
            $table->foreign('planificacion_id')->references('id')->on('planificacions')->onDelete('cascade');
            $table->integer('numero');
            $table->string('titulo');
            $table->timestamps();
        });

        // Recrear tabla temas con la estructura correcta
        Schema::dropIfExists('temas');
        Schema::create('temas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('unidad_id');
            $table->foreign('unidad_id')->references('id')->on('unidades')->onDelete('cascade');
            $table->string('nombre');
            $table->text('detalle')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Revertir cambios en tabla unidades
        if (Schema::hasTable('unidades')) {
            Schema::table('unidades', function (Blueprint $table) {
                if (Schema::hasColumn('unidades', 'planificacion_id')) {
                    $table->dropForeign(['planificacion_id']);
                    $table->dropColumn('planificacion_id');
                }
                if (Schema::hasColumn('unidades', 'numero')) {
                    $table->dropColumn('numero');
                }
                if (Schema::hasColumn('unidades', 'titulo')) {
                    $table->dropColumn('titulo');
                }
            });
        }

        // Revertir cambios en tabla temas
        if (Schema::hasTable('temas')) {
            Schema::table('temas', function (Blueprint $table) {
                if (Schema::hasColumn('temas', 'unidad_id')) {
                    $table->dropForeign(['unidad_id']);
                    $table->dropColumn('unidad_id');
                }
                if (Schema::hasColumn('temas', 'detalle')) {
                    $table->dropColumn('detalle');
                }
            });
        }
    }
}