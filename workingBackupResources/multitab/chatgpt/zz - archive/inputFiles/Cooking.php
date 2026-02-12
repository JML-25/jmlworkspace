<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class Cooking extends Model
{
    protected $table = 'cookings';

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

    protected $casts = [
        'preparationtime' => 'integer',
        'cookingtime' => 'integer',
        'totaltime' => 'integer',
        'servings' => 'integer',
        'calories' => 'integer',
        'fat' => 'integer',
        'carbs' => 'integer',
        'protein' => 'integer',
        'totalcost' => 'float',
    ];

    public function cookingIngredients(): HasMany
    {
        return $this->hasMany(CookingIngredient::class)->orderBy('sequence');
    }

    public function cookingSteps(): HasMany
    {
        return $this->hasMany(CookingStep::class)->orderBy('sequence');
    }
}
