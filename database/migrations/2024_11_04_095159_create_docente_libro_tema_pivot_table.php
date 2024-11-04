<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('docente_libro_tema', function (Blueprint $table) {
            $table->id();
            $table->foreignId('libro_tema_id')->constrained('libro_temas')->onDelete('cascade');
            $table->foreignId('docente_id')->constrained('docentes')->onDelete('cascade');

            // Prevenir duplicados
            $table->unique(['libro_tema_id', 'docente_id']);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('docente_libro_tema');
    }
};
