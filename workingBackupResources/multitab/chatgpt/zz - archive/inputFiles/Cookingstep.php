<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class CookingStep extends Model
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

    protected $casts = [
        'cooking_id' => 'integer',
        'sequence' => 'integer',
        'expectedtime' => 'integer',
    ];

    public function cooking(): BelongsTo
    {
        return $this->belongsTo(Cooking::class);
    }
}
