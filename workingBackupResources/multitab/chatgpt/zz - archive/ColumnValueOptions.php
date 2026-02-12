<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class ColumnValueOption extends Model
{
    // CHANGE THIS if your real table name differs:
    protected $table = 'column_value_options';

    public $timestamps = false;

    protected $fillable = [
        'table',
        'column',
        'internalvalue',
        'externalvalue',
        'position',
    ];

    protected $casts = [
        'position' => 'integer',
    ];
}
