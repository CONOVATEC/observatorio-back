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
        Schema::create('new_tag', function (Blueprint $table) {
            $table->id();
            /*
                ** -- Laves foreanas -- **
            */
            $table->unsignedBigInteger('tag_id');
            $table->unsignedBigInteger('new_id');
            /*
                ** -- Resticiones de las llaves foráneas -- **
            */
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('new_id')->references('id')->on('news')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('new_tag');
    }
};
