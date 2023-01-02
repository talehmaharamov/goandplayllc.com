<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('team_elements', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_az');
            $table->string('description_en');
            $table->string('description_az');
            $table->string('photo');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('team_elements');
    }
};
