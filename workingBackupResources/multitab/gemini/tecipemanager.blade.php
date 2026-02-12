<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">{{ $recipe->exists ? 'Edit' : 'Create' }} Recipe</h1>

    <div class="flex border-b border-gray-200 mb-6">
        <button wire:click="setTab('details')" class="py-2 px-4 {{ $currentTab === 'details' ? 'border-b-2 border-blue-600 font-bold' : '' }}">Details</button>
        <button wire:click="setTab('ingredients')" class="py-2 px-4 {{ $currentTab === 'ingredients' ? 'border-b-2 border-blue-600 font-bold' : '' }}">Ingredients</button>
        <button wire:click="setTab('instructions')" class="py-2 px-4 {{ $currentTab === 'instructions' ? 'border-b-2 border-blue-600 font-bold' : '' }}">Instructions</button>
    </div>

    <div class="bg-white p-4 shadow rounded">
        @if($currentTab === 'details')
            <livewire:recipe-details :recipe="$recipe" />
        @elseif($currentTab === 'ingredients')
            <livewire:ingredient-manager :recipe="$recipe" />
        @else
            <livewire:instruction-manager :recipe="$recipe" />
        @endif
    </div>
</div>