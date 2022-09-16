<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('apellido');
            $table->string('nombre');
            $table->integer('tipo_documento_id')->default(1);
            $table->string('nro_documento');
            $table->string('email');
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
        Schema::dropIfExists('docentes');
    }
}
