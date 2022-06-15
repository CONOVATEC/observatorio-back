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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title',45);
            $table->string('slug');
            $table->string('extract',45);
            $table->enum('status',[1,2])->default(1);
            $table->tinyInteger('tendencia_active');
            /*
                ** -- Laves foreanas -- **
            */
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('like_id');
            $table->unsignedBigInteger('user_id');
            $table->softDeletes()->nullable();
            /*
                ** -- Resticiones de las llaves foráneas -- **
            */
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('like_id')->references('id')->on('likes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('news');
    }
};
