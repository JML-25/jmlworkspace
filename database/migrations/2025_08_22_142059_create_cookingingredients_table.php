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
        Schema::create('cookingingredients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cooking_id')->constrained('cookings')->onDelete('cascade');
            ;
            $table->foreignId('ingredient_id')->constrained('ingredients')->onDelete('cascade');
            ;
            $table->integer('sequence');
            $table->string('title');
            $table->string('ingredientdescription');
            $table->float('quantity', 8);
            $table->string('unit', 64);
            $table->string('instruction');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cookingingredients');
    }
};