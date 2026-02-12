<?php

namespace App\Support;

use App\Models\ColumnValueOption;

final class ColumnValueOptionsRepository
{
    /**
     * Returns ordered options for a (table, column).
     * Format:
     * [
     *   ['internal' => 'ABC', 'external' => 'Displayed label'],
     *   ...
     * ]
     *
     * @return array<int, array{internal:string, external:string}>
     */
    public function get(string $table, string $column): array
    {
        $rows = ColumnValueOption::query()
            ->where('table', $table)
            ->where('column', $column)
            ->orderBy('position')
            ->get(['internalvalue', 'externalvalue']);

        $out = [];
        foreach ($rows as $r) {
            $out[] = [
                'internal' => (string) $r->internalvalue,
                'external' => (string) $r->externalvalue,
            ];
        }
        return $out;
    }

    /**
     * @return string[]
     */
    public function getInternalValues(string $table, string $column): array
    {
        $options = $this->get($table, $column);
        $values = [];
        foreach ($options as $o) {
            $values[] = $o['internal'];
        }
        return $values;
    }
}
