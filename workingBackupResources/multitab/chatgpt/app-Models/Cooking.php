<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cooking extends Model
{
    protected $fillable = [
        'name',
        'description',
        'additionalinformation',
        'recipestatus',
        'typeofdish',
        'difficultylevel',
        'preparationtime',
        'cookingtime',
        'totaltime',
        'servings',
        'calories',
        'fat',
        'carbs',
        'protein',
        'totalcost',
    ];

    public function cookingIngredients(): HasMany
    {
        return $this->hasMany(Cookingingredient::class);
    }

    public function cookingSteps(): HasMany
    {
        return $this->hasMany(Cookingstep::class);
    }
}
