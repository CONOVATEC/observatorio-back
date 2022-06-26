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
        Schema::create('youth_observatories', function (Blueprint $table) {
            $table->id();
            $table->string('mission')->unique()->nullable();
            $table->string('vision')->unique()->nullable();
            $table->string('about_us')->nullable();
            $table->string('organization_chart')->nullable();
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
        Schema::dropIfExists('youth_observatories');
    }
};
