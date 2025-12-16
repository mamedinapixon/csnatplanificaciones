<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveJefeCatedraIdFromCatedrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('catedras', function (Blueprint $table) {
            $table->dropForeign(['jefe_catedra_id']);
            $table->dropColumn('jefe_catedra_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('catedras', function (Blueprint $table) {
            $table->foreignId('jefe_catedra_id')
                ->constrained('users')
                ->onDelete('cascade');
        });
    }
}
