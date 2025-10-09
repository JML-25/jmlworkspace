<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Ingredient extends Model
{
    //
    use HasFactory, Notifiable;
    protected $fillable = [
        'title',
        'description',
        'ingredienttype'

    ];
    public function cookingingredients(): HasMany 
{ 
    return $this->hasMany(Cookingingredient::class); 
}
}