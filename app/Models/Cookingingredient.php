<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cookingingredient extends Model
{
    //
    use HasFactory, Notifiable;
    protected $fillable = [
        'title',
        'sequence',
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