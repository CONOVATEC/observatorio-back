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
            $table->text('mission')->nullable(false);
            $table->text('vision')->nullable(false);
            $table->text('about_us')->nullable();
            $table->text('url_organization_chart')->nullable();

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
