<!-- resources/views/livewire/instructions-tab.blade.php -->
<div>
    <form wire:submit="addInstruction" class="mb-4">
        <input type="text" wire:model="newInstruction.step" placeholder="Step" class="p-2 border">
        <input type="text" wire:model="newInstruction.description" placeholder="Description" class="p-2 border">
        <button type="submit" class="px-4 py-2 bg-green-500 text-white">Add</button>
    </form>

    <ul>
        @foreach($instructions as $instruction)
            <li class="flex justify-between items-center mb-2">
                @if($editingInstructionId === $instruction['id'])
                    <div>
                        <input type="text" wire:model="editInstruction.step" class="p-2 border">
                        <input type="text" wire:model="editInstruction.description" class="p-2 border">
                        <button wire:click="updateInstruction" class="px-2 py-1 bg-blue-500 text-white">Save</button>
                    </div>
                @else
                    <div>
                        {{ $instruction['step'] }}. {{ $instruction['description'] }}
                        <button wire:click="editInstruction({{ $instruction['id'] }})" class="px-2 py-1 bg-yellow-500 text-white">Edit</button>
                        <button wire:click="deleteInstruction({{ $instruction['id'] }})" class="px-2 py-1 bg-red-500 text-white">Delete</button>
                    </div>
                @endif
            </li>
        @endforeach
    </ul>
</div>
