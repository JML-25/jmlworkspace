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
        Schema::create('cookings', function (Blueprint $table) {
            $table->id();
            $table->String('name');
            $table->Text('description')->nullable();
            $table->Text('additionalinformation')->nullable();
            $table->string('recipestatus', 7)->nullable();
            $table->String('typeofdish', 7)->nullable();
            $table->string('difficultylevel', 7)->nullable();
            $table->integer('preparationtime')->nullable();
            $table->integer('cookingtime')->nullable();
            $table->integer('totaltime')->nullable();
            $table->integer('servings')->nullable();
            $table->integer('calories')->nullable();
            $table->integer('fat')->nullable();
            $table->integer('carbs')->nullable();
            $table->integer('protein')->nullable();
            $table->float('totalcost', 15)->nullable();
            
            
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cookings');
    }
};