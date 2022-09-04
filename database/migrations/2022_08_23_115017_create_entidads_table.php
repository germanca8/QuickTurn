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
        Schema::create('entidads', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('nombreEntidad')->unique();
            $table->string('direccionEntidad');
            $table->string('horarioEntidad');
            $table->string('nombreFiscal')->nullable();
            $table->string('nif')->nullable();
            $table->text('url');
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
        Schema::dropIfExists('entidads');
    }
};
