<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ColumnValueOption extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'table',
        'column',
        'internalvalue',
        'externalvalue',
        'position',
    ];
}
