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
        Schema::create('seccions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('entidad_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('nombreSeccion');
            $table->integer('turnoActual')->nullable()->default(0);
            $table->integer('ultimoTurno')->nullable()->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('seccions');
    }
};
