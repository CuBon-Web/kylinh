<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileAttestationsTable extends Migration
{
    public function up()
    {
        Schema::create('profile_attestations', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('');
            $table->string('image')->nullable();
            $table->unsignedSmallInteger('sort')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('profile_attestations');
    }
}
