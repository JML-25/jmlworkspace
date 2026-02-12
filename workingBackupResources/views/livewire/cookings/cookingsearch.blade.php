<div>
    <div>
        <input
        type="text"
        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none" 
             
        wire:model.live.debounce.300ms="query";
    >
    </div>
    

    @if($showDropdown)
        <ul class="absolute z-10 w-full bg-white border rounded shadow mt-1">
            @foreach($results as $ingredient)
                <li
                    wire:click="selectIngredient({{ $ingredient->id }})"
                    class="px-3 py-2 cursor-pointer hover:bg-gray-100"
                >
                    {{ $ingredient->title }}
                    <div class="text-xs text-gray-600">{{ $ingredient->description }}</div>
                </li>
            @endforeach
        </ul>
    @endif
</div>
