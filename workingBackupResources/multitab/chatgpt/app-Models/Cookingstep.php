<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cookingstep extends Model
{
    protected $table = 'cookingsteps';

    protected $fillable = [
        'cooking_id',
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
