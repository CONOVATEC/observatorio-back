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
        Schema::create('news_tag', function (Blueprint $table) {
            $table->id();
            /*
                ** -- Laves foreanas -- **
            */
            $table->unsignedBigInteger('news_id');
            $table->unsignedBigInteger('tag_id');

            /*
                ** -- Resticiones de las llaves foráneas -- **
            */
            $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('news_tag');
    }
};
