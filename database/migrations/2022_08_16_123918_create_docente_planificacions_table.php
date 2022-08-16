<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocentePlanificacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docente_planificacions', function (Blueprint $table) {
            $table->id();
            $table->integer('planificacion_id');
            $table->integer('docente_id');
            $table->integer('cargo_id');
            $table->softDeletes();
            $table->timestamps();

            /*
            $table->integer('')->default(0);
            $table->string('')->default('');
            $table->text('')->default('');
            $table->boolean('')->default(0);
            $table->char('name',1)->default('');
            */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('docente_planificacions');
    }
}
