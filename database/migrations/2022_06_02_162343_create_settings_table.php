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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('name_entity',45)->unique();
            //$table->string('logo',255)->nullable();
            $table->string('link_facebook',255)->nullable();
            $table->string('link_instagram',255)->nullable();
            $table->string('link_linkedin',255)->nullable();
            $table->string('link_youtube',255)->nullable();
            $table->text('url_image')->nullable();
            /*
                ** -- Laves foreanas -- **
            */
            $table->unsignedBigInteger('user_id');

            /*
                ** -- Resticiones de las llaves foráneas -- **
            */
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
        Schema::dropIfExists('settings');
    }
};
