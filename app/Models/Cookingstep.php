<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class Cookingstep extends Model
{
    //
     use HasFactory, Notifiable;
    protected $fillable = [
        'title',
        'sequence',
        'tasktype',
        'instruction',
        'expectedtime',
        'additionalinformation',
        
            ];

    public function cooking(): BelongsTo
{ 
    return $this->belongsTo(Cooking::class); 
}
}