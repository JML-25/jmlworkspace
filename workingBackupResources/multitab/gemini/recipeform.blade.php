<div class="p-6 bg-white rounded-lg shadow">
    <form wire:submit="save">
        <div class="flex border-b mb-4">
            <button type="button" @click="$wire.activeTab = 'details'" :class="{'border-b-2 border-blue-500': $wire.activeTab === 'details'}" class="px-4 py-2">Details</button>
            <button type="button" @click="$wire.activeTab = 'ingredients'" :class="{'border-b-2 border-blue-500': $wire.activeTab === 'ingredients'}" class="px-4 py-2">Ingredients</button>
            <button type="button" @click="$wire.activeTab = 'instructions'" :class="{'border-b-2 border-blue-500': $wire.activeTab === 'instructions'}" class="px-4 py-2">Instructions</button>
        </div>

        <div x-show="$wire.activeTab === 'details'">
            <div class="mb-4">
                <label>Recipe Title</label>
                <input type="text" wire:model="title" class="w-full border p-2">
                @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>

        <div x-show="$wire.activeTab === 'ingredients'">
            @foreach($ingredients as $index => $ingredient)
                <div class="flex gap-2 mb-2" wire:key="ing-{{ $index }}">
                    <input type="text" wire:model="ingredients.{{ $index }}.name" placeholder="Ingredient" class="border p-2 flex-1">
                    <input type="text" wire:model="ingredients.{{ $index }}.amount" placeholder="Amount" class="border p-2 w-32">
                    <button type="button" wire:click="removeIngredient({{ $index }})" class="text-red-500">Remove</button>
                </div>
            @endforeach
            <button type="button" wire:click="addIngredient" class="mt-2 bg-green-500 text-white px-3 py-1 rounded">+ Add Ingredient</button>
        </div>

        <div x-show="$wire.activeTab === 'instructions'">
            @foreach($instructions as $index => $instruction)
                <div class="flex gap-2 mb-2" wire:key="ins-{{ $index }}">
                    <span class="p-2">{{ $index + 1 }}.</span>
                    <textarea wire:model="instructions.{{ $index }}.content" class="border p-2 flex-1"></textarea>
                    <button type="button" wire:click="removeInstruction({{ $index }})" class="text-red-500">Remove</button>
                </div>
            @endforeach
            <button type="button" wire:click="addInstruction" class="mt-2 bg-green-500 text-white px-3 py-1 rounded">+ Add Step</button>
        </div>

        <div class="mt-6 border-t pt-4">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded">Save Recipe</button>
        </div>
    </form>
</div>