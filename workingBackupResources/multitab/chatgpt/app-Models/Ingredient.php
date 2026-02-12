<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ingredient extends Model
{
    protected $fillable = [
        'title',
        'description',
        'ingredienttype',
    ];

    public function cookingIngredients(): HasMany
    {
        return $this->hasMany(Cookingingredient::class);
    }
}
