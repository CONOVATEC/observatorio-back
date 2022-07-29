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
            $table->text('mission')->unique()->nullable();
            $table->text('vision')->unique()->nullable();
            $table->text('about_us')->nullable();
            $table->text('organization_chart')->nullable();
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
