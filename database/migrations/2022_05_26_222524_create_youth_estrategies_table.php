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
        Schema::create('youth_estrategies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('tema');
            $table->string('description');
            $table->string('ejes');
            $table->string('imagen_tema');
            $table->string('imagen_infografia');
            $table->string('video_estrategia');

             $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('youth_estrategies');
    }
};
