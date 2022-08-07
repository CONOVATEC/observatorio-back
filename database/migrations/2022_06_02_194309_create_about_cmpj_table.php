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
        Schema::create('about_cmpj', function (Blueprint $table) {
            $table->id();
            $table->string('title_cmpj')->nullable(false);
            $table->text('description_cmpj')->nullable();
            $table->string('title_assembly')->nullable(false);
            $table->text('description_assembly')->nullable();
            $table->string('title_directive')->nullable(false);
            $table->text('description_directive')->nullable();
            $table->string('link_video')->nullable();
            $table->string('link_drive')->nullable();
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
