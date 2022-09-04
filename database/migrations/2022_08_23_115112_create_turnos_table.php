<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turnos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('seccion_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignUuid('invitado_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('numTurno');
            $table->timestamp('fechaTurno');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *s
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turnos');
    }
};
