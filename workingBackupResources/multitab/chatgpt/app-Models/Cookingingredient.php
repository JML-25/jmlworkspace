<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cookingingredient extends Model
{
    protected $table = 'cookingingredients';

    protected $fillable = [
        'cooking_id',
        'ingredient_id',
        'sequence',
        'title',
        'ingredientdescription',
        'quantity',
        'unit',
        'instruction',
    ];

    public function cooking(): BelongsTo
    {
        return $this->belongsTo(Cooking::class);
    }

    public function ingredient(): BelongsTo
    {
        return $this->belongsTo(Ingredient::class);
    }
}
