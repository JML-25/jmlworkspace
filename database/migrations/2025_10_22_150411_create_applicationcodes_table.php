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
        Schema::create('applicationcodes', function (Blueprint $table) {
            $table->id();
            $table->string('table');
            $table->string('code');
            $table->integer('sequence');
            $table->string('label');
            $table->string('internal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicationcodes');
    }
};