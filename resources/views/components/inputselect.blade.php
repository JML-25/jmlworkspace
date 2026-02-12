<div class="col-span-{{ $col }} md:col-span-{{ $col }}">
    <!-- inputselect component rendered here -->
	<label for="{{ $field }}" class="block text-gray-700 font-medium mb-1">{{ $prompt }}</label>
			<select name="$field" id="$field"
				class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
				
				{{$sentence}}
			</select>
	
</div>

{{-- 
 <div class="col-span-2 sm:col-span-1">
        <label for="typeofdish" class="block text-gray-700 font-medium mb-1">Type of dish</label>
        <select name="typeofdish" id="typeofdish"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                    <option value="entrée">Entrée</option>
                    <option value="prncpal">Principal</option>
                    <option value="dessert">Dessert</option>
                    <option value="autres">Autres</option>
        </select>
      </div> --}}
