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
        Schema::create('youth_strategies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('theme');
            $table->string('description');
            $table->string('axes');//ejes
            $table->string('imagen_theme');
            $table->string('imagen_infographic');
            $table->string('video_strategy');

            /*
                ** -- Laves foreanas -- **
            */
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
        Schema::dropIfExists('youth_strategies');
    }
};
