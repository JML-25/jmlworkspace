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
            $table->foreign('cooking_id')->references('id')
                ->on('cookings');
            ;
            $table->foreign('ingredient_id')->references('id')
                ->on('ingredients');
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