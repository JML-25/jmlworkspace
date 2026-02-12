<!-- resources/views/livewire/ingredients-tab.blade.php -->
<div>
    <form wire:submit="addIngredient" class="mb-4">
        <input type="text" wire:model="newIngredient.name" placeholder="Name" class="p-2 border">
        <input type="text" wire:model="newIngredient.quantity" placeholder="Quantity" class="p-2 border">
        <button type="submit" class="px-4 py-2 bg-green-500 text-white">Add</button>
    </form>

    <ul>
        @foreach($ingredients as $ingredient)
            <li class="flex justify-between items-center mb-2">
                @if($editingIngredientId === $ingredient['id'])
                    <div>
                        <input type="text" wire:model="editIngredient.name" class="p-2 border">
                        <input type="text" wire:model="editIngredient.quantity" class="p-2 border">
                        <button wire:click="updateIngredient" class="px-2 py-1 bg-blue-500 text-white">Save</button>
                    </div>
                @else
                    <div>
                        {{ $ingredient['name'] }} - {{ $ingredient['quantity'] }}
                        <button wire:click="editIngredient({{ $ingredient['id'] }})" class="px-2 py-1 bg-yellow-500 text-white">Edit</button>
                        <button wire:click="deleteIngredient({{ $ingredient['id'] }})" class="px-2 py-1 bg-red-500 text-white">Delete</button>
                    </div>
                @endif
            </li>
        @endforeach
    </ul>
</div>
