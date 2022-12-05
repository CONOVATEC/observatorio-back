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
        Schema::create('directives', function (Blueprint $table) {
            $table->id();
            $table->string('name',100)->unique();
            $table->enum('status',[1,2])->default(1);
            $table->unsignedBigInteger('position_id');
            $table->text('url_image')->nullable();
            $table->timestamps();
            $table->foreign('position_id')->references('id')->on('positions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('directives');
    }
};
