<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class CookingIngredient extends Model
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

    protected $casts = [
        'cooking_id' => 'integer',
        'ingredient_id' => 'integer',
        'sequence' => 'integer',
        'quantity' => 'float',
    ];

    public function cooking(): BelongsTo
    {
        return $this->belongsTo(Cooking::class);
    }

    // Optional: if you have App\Models\Ingredient
    // public function ingredient(): BelongsTo
    // {
    //     return $this->belongsTo(Ingredient::class);
    // }
}
