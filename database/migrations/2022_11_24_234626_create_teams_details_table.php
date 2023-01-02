<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('teams_details', function (Blueprint $table) {
            $table->id();
            $table->string('title_en')->nullable();
            $table->string('title_az')->nullable();
            $table->string('description_en')->nullable();
            $table->string('description_az')->nullable();
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
        Schema::dropIfExists('teams_details');
    }
};
