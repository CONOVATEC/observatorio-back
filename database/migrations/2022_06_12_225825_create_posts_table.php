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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title',255)->nullable(false);
            $table->string('slug');
            $table->mediumText('extract')->nullable();
            $table->longText('content')->nullable();
            $table->enum('status',[1,2])->default(1);
            $table->enum('type_new',[1,2])->default(1);
            $table->enum('publicado',[1,2])->default(1);
            $table->string('importantOne')->nullable();
            $table->string('importantTwo')->nullable();
            $table->string('importantThree')->nullable();
            $table->string('importantFour')->nullable();
            $table->tinyInteger('tendencia_active')->nullable();
            $table->enum('news_cover',[1,2])->default(1);
            /*
                ** -- Laves foreanas -- **
            */
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('user_id');
            $table->softDeletes();
            /*
                ** -- Resticiones de las llaves foráneas -- **
            */
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('posts');
    }
};
