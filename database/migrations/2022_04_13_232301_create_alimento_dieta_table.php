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
        Schema::create('alimento_dieta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alimento_id');
            $table->unsignedBigInteger('dieta_id');
            $table->foreign('alimento_id')->references('id')->on('alimentos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('dieta_id')->references('id')->on('dietas')->onDelete('cascade')->onUpdate('cascade');
          
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
        Schema::dropIfExists('alimento_dieta');
    }
};
