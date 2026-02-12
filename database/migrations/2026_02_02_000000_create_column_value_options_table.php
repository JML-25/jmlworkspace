<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('column_value_options', function (Blueprint $table) {
            $table->id();

            // Target table name (cookings, cookingingredients, cookingsteps)
            $table->string('table', 50);

            // Column name within that table (typeofdish, unit, etc.)
            $table->string('column', 50);

            // Value stored in the database
            $table->string('internalvalue', 10);

            // Value shown to the user
            $table->string('externalvalue', 20);

            // Order in which options appear in <select>
            $table->unsignedInteger('position');

            // Prevent duplicates for same table/column/internalvalue
            $table->unique(
                ['table', 'column', 'internalvalue'],
                'column_value_options_unique'
            );

            // Helpful index for lookups
            $table->index(
                ['table', 'column', 'position'],
                'column_value_options_lookup'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('column_value_options');
    }
};
