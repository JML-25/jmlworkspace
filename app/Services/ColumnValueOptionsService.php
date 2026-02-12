<?php

namespace App\Services;

use App\Models\ColumnValueOption;

class ColumnValueOptionsService
{
    /**
     * @return array<string,string> internal => external
     */
    public function getSelectOptions(string $table, string $column): array
    {
        $rows = ColumnValueOption::query()
            ->where('table', $table)
            ->where('column', $column)
            ->orderBy('position')
            ->get(['internalvalue', 'externalvalue']);

        $out = [];
        foreach ($rows as $row) {
            $out[$row->internalvalue] = $row->externalvalue;
        }

        return $out;
    }
}
