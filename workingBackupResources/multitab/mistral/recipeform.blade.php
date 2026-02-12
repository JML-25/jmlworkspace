<!-- resources/views/livewire/recipe-form.blade.php -->
<div>
    <div class="mb-4">
        <button wire:click="$set('activeTab', 'recipe')" class="px-4 py-2 {{ $activeTab === 'recipe' ? 'bg-blue-500 text-white' : 'bg-gray-200' }}">Recipe</button>
        <button wire:click="$set('activeTab', 'ingredients')" class="px-4 py-2 {{ $activeTab === 'ingredients' ? 'bg-blue-500 text-white' : 'bg-gray-200' }}">Ingredients</button>
        <button wire:click="$set('activeTab', 'instructions')" class="px-4 py-2 {{ $activeTab === 'instructions' ? 'bg-blue-500 text-white' : 'bg-gray-200' }}">Instructions</button>
    </div>

    <div>
        @if($activeTab === 'recipe')
            <livewire:recipe-tab :recipe="$recipe" />
        @elseif($activeTab === 'ingredients')
            <livewire:ingredients-tab :recipe="$recipe" :ingredients="$ingredients" />
        @elseif($activeTab === 'instructions')
            <livewire:instructions-tab :recipe="$recipe" :instructions="$instructions" />
        @endif
    </div>
</div>
