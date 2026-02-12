<div class="space-y-3">
    <div class="flex justify-end">
        <button type="button" class="border rounded px-3 py-2"
                wire:click="requestAddRow">
            + Add step
        </button>
    </div>

    <div class="space-y-2">
        @foreach($cookingsteps as $i => $row)
            <div class="border rounded p-3 space-y-2 {{ $row['_delete'] ? 'opacity-50' : '' }}"
                 wire:key="cs-{{ $row['id'] ?? 'new-'.$i }}">
                <div class="flex items-center justify-between">
                    <div class="text-sm text-gray-600">
                        Step {{ $row['sequence'] }} {{ $row['id'] ? "(id {$row['id']})" : "(new)" }}
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

                <div class="grid grid-cols-1 md:grid-cols-4 gap-2">
                    <div>
                        <label class="block text-sm font-medium">Title</label>
                        <input class="border rounded px-3 py-2 w-full" type="text"
                               value="{{ $row['title'] }}"
                               @disabled($row['_delete'])
                               wire:input="setField({{ $i }}, 'title', $event.target.value)">
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Task type (max 7)</label>
                        <input class="border rounded px-3 py-2 w-full" type="text"
                               value="{{ $row['tasktype'] }}"
                               @disabled($row['_delete'])
                               wire:input="setField({{ $i }}, 'tasktype', $event.target.value)">
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Expected time</label>
                        <input class="border rounded px-3 py-2 w-full" type="number"
                               value="{{ $row['expectedtime'] }}"
                               @disabled($row['_delete'])
                               wire:input="setField({{ $i }}, 'expectedtime', $event.target.value)">
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Additional info</label>
                        <input class="border rounded px-3 py-2 w-full" type="text"
                               value="{{ $row['additionalinformation'] }}"
                               @disabled($row['_delete'])
                               wire:input="setField({{ $i }}, 'additionalinformation', $event.target.value)">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium">Instruction</label>
                    <textarea class="border rounded px-3 py-2 w-full" rows="3"
                              @disabled($row['_delete'])
                              wire:input="setField({{ $i }}, 'instruction', $event.target.value)">{{ $row['instruction'] }}</textarea>
                </div>
            </div>
        @endforeach
    </div>
</div>
