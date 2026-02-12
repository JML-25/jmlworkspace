<div>
    <h3 class="font-semibold mb-4">Manage Ingredients</h3>
    
    <table class="w-full mb-4">
        @foreach($ingredients as $ing)
            <tr class="border-b">
                <td class="py-2">{{ $ing->name }}</td>
                <td class="py-2">{{ $ing->amount }}</td>
                <td class="py-2 text-right">
                    <button wire:click="removeIngredient({{ $ing->id }})" class="text-red-500 text-sm">Delete</button>
                </td>
            </tr>
        @endforeach
    </table>

    <div class="grid grid-cols-3 gap-2">
        <input type="text" wire:model="newName" placeholder="Ingredient Name" class="border p-2">
        <input type="text" wire:model="newAmount" placeholder="Amount" class="border p-2">
        <button wire:click="addIngredient" class="bg-blue-500 text-white px-4 py-2 rounded">Add</button>
    </div>
</div>