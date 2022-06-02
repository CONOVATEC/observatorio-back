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
        Schema::create('logos', function (Blueprint $table) {
            $table->id();
            $table->string('name',45);
            $table->string('image_logo');
            $table->string('social_media');
             /*
                ** -- Laves foreanas -- **
            */
            $table->unsignedBigInteger('type_logo_id');
            $table->foreign('type_logo_id')->references('id')->on('type_logo');


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
        Schema::dropIfExists('logos');
    }
};
