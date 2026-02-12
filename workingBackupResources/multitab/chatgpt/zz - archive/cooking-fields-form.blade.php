<div class="space-y-3">
    <div>
        <label class="block text-sm font-medium">Name</label>
        <input class="border rounded px-3 py-2 w-full" type="text"
               value="{{ $name }}"
               wire:input="setField('name', $event.target.value)">
        @error('name') <div class="text-sm text-red-700">{{ $message }}</div> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium">Description</label>
        <textarea class="border rounded px-3 py-2 w-full" rows="3"
                  wire:input="setField('description', $event.target.value)">{{ $description }}</textarea>
    </div>

    <div>
        <label class="block text-sm font-medium">Additional information</label>
        <textarea class="border rounded px-3 py-2 w-full" rows="3"
                  wire:input="setField('additionalinformation', $event.target.value)">{{ $additionalinformation }}</textarea>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
        <div>
            <label class="block text-sm font-medium">Recipe status (max 7)</label>
            <input class="border rounded px-3 py-2 w-full" type="text"
                   value="{{ $recipestatus }}"
                   wire:input="setField('recipestatus', $event.target.value)">
        </div>

        <div>
            <label class="block text-sm font-medium">Type of dish (max 7)</label>
            <input class="border rounded px-3 py-2 w-full" type="text"
                   value="{{ $typeofdish }}"
                   wire:input="setField('typeofdish', $event.target.value)">
        </div>

        <div>
            <label class="block text-sm font-medium">Difficulty (max 7)</label>
            <input class="border rounded px-3 py-2 w-full" type="text"
                   value="{{ $difficultylevel }}"
                   wire:input="setField('difficultylevel', $event.target.value)">
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
        <div>
            <label class="block text-sm font-medium">Preparation time</label>
            <input class="border rounded px-3 py-2 w-full" type="number"
                   value="{{ $preparationtime }}"
                   wire:input="setField('preparationtime', $event.target.value)">
        </div>
        <div>
            <label class="block text-sm font-medium">Cooking time</label>
            <input class="border rounded px-3 py-2 w-full" type="number"
                   value="{{ $cookingtime }}"
                   wire:input="setField('cookingtime', $event.target.value)">
        </div>
        <div>
            <label class="block text-sm font-medium">Total time</label>
            <input class="border rounded px-3 py-2 w-full" type="number"
                   value="{{ $totaltime }}"
                   wire:input="setField('totaltime', $event.target.value)">
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-5 gap-3">
        <div>
            <label class="block text-sm font-medium">Servings</label>
            <input class="border rounded px-3 py-2 w-full" type="number"
                   value="{{ $servings }}"
                   wire:input="setField('servings', $event.target.value)">
        </div>
        <div>
            <label class="block text-sm font-medium">Calories</label>
            <input class="border rounded px-3 py-2 w-full" type="number"
                   value="{{ $calories }}"
                   wire:input="setField('calories', $event.target.value)">
        </div>
        <div>
            <label class="block text-sm font-medium">Fat</label>
            <input class="border rounded px-3 py-2 w-full" type="number"
                   value="{{ $fat }}"
                   wire:input="setField('fat', $event.target.value)">
        </div>
        <div>
            <label class="block text-sm font-medium">Carbs</label>
            <input class="border rounded px-3 py-2 w-full" type="number"
                   value="{{ $carbs }}"
                   wire:input="setField('carbs', $event.target.value)">
        </div>
        <div>
            <label class="block text-sm font-medium">Protein</label>
            <input class="border rounded px-3 py-2 w-full" type="number"
                   value="{{ $protein }}"
                   wire:input="setField('protein', $event.target.value)">
        </div>
    </div>

    <div>
        <label class="block text-sm font-medium">Total cost</label>
        <input class="border rounded px-3 py-2 w-full" type="number" step="0.01"
               value="{{ $totalcost }}"
               wire:input="setField('totalcost', $event.target.value)">
    </div>
</div>
