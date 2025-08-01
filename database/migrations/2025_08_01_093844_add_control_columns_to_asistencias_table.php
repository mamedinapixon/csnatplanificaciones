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
        Schema::table('asistencias', function (Blueprint $table) {
            $table->boolean('control_realizado')->default(false)->after('longitud');
            $table->unsignedBigInteger('control_user_id')->nullable()->after('control_realizado');
            $table->boolean('control_resultado')->nullable()->after('control_user_id');
            $table->text('control_observacion')->nullable()->after('control_resultado');

            $table->foreign('control_user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('asistencias', function (Blueprint $table) {
            $table->dropForeign(['control_user_id']);
            $table->dropColumn([
                'control_realizado',
                'control_user_id',
                'control_resultado',
                'control_observacion',
            ]);
        });
    }
};
