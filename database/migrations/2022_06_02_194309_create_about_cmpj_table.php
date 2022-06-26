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
        Schema::create('about_cmpjs', function (Blueprint $table) {
            $table->id();
            $table->string('ordinance')->nullable(false);
            $table->string('about_us')->nullable();
            $table->string('vision')->nullable();
            $table->string('functions')->nullable();//funciones
            $table->text('board_of_directors')->nullable();
            $table->integer('social')->nullable();
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
        Schema::dropIfExists('about_cmpj');
    }
};
