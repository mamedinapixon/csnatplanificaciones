<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salidas', function (Blueprint $table) {
            $table->id();
            $table->integer('planificaicon_id');
            $table->string('nombre');
            $table->integer('dias_tentativos')->default(0);
            $table->string('fecha_tentativa')->default('');
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
        Schema::dropIfExists('salidas');
    }
}
