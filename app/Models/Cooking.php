<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cooking extends Model
{
    //
     /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
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

    public function cookingingredients(): HasMany 
{ 
    return $this->hasMany(Cookingingredient::class); 
}
    public function cookingsteps(): HasMany 
{ 
    return $this->hasMany(Cookingstep::class); 
}
    // protected $guarded = [];
}