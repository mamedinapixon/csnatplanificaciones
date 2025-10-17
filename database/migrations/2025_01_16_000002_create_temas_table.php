<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('temas')) {
            Schema::create('temas', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('unidad_id');
                $table->foreign('unidad_id')->references('id')->on('unidades')->onDelete('cascade');
                $table->string('nombre');
                $table->text('detalle')->nullable();
                $table->timestamps();
            });
        } else {
            // Si la tabla ya existe, verificar y agregar columnas faltantes
            Schema::table('temas', function (Blueprint $table) {
                if (!Schema::hasColumn('temas', 'unidad_id')) {
                    $table->unsignedBigInteger('unidad_id')->after('id');
                    $table->foreign('unidad_id')->references('id')->on('unidades')->onDelete('cascade');
                }
                if (!Schema::hasColumn('temas', 'detalle')) {
                    $table->text('detalle')->nullable()->after('nombre');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temas');
    }
}