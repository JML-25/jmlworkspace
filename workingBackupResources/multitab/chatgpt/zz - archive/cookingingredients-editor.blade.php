<div class="space-y-3">
    <div class="flex justify-end">
        <button type="button" class="border rounded px-3 py-2"
                wire:click="requestAddRow">
            + Add cooking ingredient
        </button>
    </div>

    <div class="space-y-2">
        @foreach($cookingingredients as $i => $row)
            <div class="border rounded p-3 space-y-2 {{ $row['_delete'] ? 'opacity-50' : '' }}"
                 wire:key="ci-{{ $row['id'] ?? 'new-'.$i }}">
                <div class="flex items-center justify-between">
                    <div class="text-sm text-gray-600">
                        #{{ $row['sequence'] }} {{ $row['id'] ? "(id {$row['id']})" : "(new)" }}
                    </div>

                    <div class="flex gap-2">
                        @if($row['_delete'])
                            <button type="button" class="border rounded px-3 py-1"
                                    wire:click="requestRestoreRow({{ $i }})">
                                Restore
                            </button>
                        @else
                            <button type="button" class="border rounded px-3 py-1"
                                    wire:click="requestDeleteRow({{ $i }})">
                                Delete
                            </button>
                        @endif
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                    <div>
                        <label class="block text-sm font-medium">Ingredient ID</label>
                        <input class="border rounded px-3 py-2 w-full" type="number"
                               value="{{ $row['ingredient_id'] }}"
                               @disabled($row['_delete'])
                               wire:input="setField({{ $i }}, 'ingredient_id', $event.target.value)">
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Title</label>
                        <input class="border rounded px-3 py-2 w-full" type="text"
                               value="{{ $row['title'] }}"
                               @disabled($row['_delete'])
                               wire:input="setField({{ $i }}, 'title', $event.target.value)">
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Description</label>
                        <input class="border rounded px-3 py-2 w-full" type="text"
                               value="{{ $row['ingredientdescription'] }}"
                               @disabled($row['_delete'])
                               wire:input="setField({{ $i }}, 'ingredientdescription', $event.target.value)">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                    <div>
                        <label class="block text-sm font-medium">Quantity</label>
                        <input class="border rounded px-3 py-2 w-full" type="number" step="0.01"
                               value="{{ $row['quantity'] }}"
                               @disabled($row['_delete'])
                               wire:input="setField({{ $i }}, 'quantity', $event.target.value)">
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Unit</label>
                        <input class="border rounded px-3 py-2 w-full" type="text"
                               value="{{ $row['unit'] }}"
                               @disabled($row['_delete'])
                               wire:input="setField({{ $i }}, 'unit', $event.target.value)">
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Instruction</label>
                        <input class="border rounded px-3 py-2 w-full" type="text"
                               value="{{ $row['instruction'] }}"
                               @disabled($row['_delete'])
                               wire:input="setField({{ $i }}, 'instruction', $event.target.value)">
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
