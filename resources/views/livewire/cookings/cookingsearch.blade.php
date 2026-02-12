<div class="fixed ml-5 top-3 left-0 z-50">
@if ($open)
    <div class="">
        <input
        type="text" placeholder="Search for ingredient..."
        class="w-sm px-4 py-2 bg-blue-50 border border-gray-100 rounded-lg 
				placeholder:text-gray-500 placeholder:italic 
				focus:ring-2 focus:ring-indigo-500 focus:outline-none" 
        
        wire:model.live.debounce.150ms="query";
    >
    </div>
    

    @if($showDropdown)
        <ul class="absolute w-sm border rounded-lg mt-1 bg-blue-50">
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
@endif
</div>
