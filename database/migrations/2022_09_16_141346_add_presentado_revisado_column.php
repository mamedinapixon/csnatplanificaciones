<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPresentadoRevisadoColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('planificacions', function (Blueprint $table) {
            $table->timestamp('presentado_at')->nullable();
            $table->timestamp('revisado_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('planificacions', function (Blueprint $table) {
            $table->dropColumn('presentado_at');
            $table->dropColumn('revisado_at');
        });
    }
}
