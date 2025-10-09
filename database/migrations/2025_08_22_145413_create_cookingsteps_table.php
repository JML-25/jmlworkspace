<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cookingsteps', function (Blueprint $table) {
            $table->id();
            $table->foreign('cooking_id')->references('cookings')->on('id');
            $table->string('title');
            $table->integer('sequence');
            $table->string('tasktype',7);
            $table->text('instruction');
            $table->integer('expectedtime');
            $table->text('additionalinformation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cookingsteps');
    }
};