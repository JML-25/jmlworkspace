<div class="col-span-6 md:col-span-{{ $col }}">
    <!-- inputtext component rendered here -->
	<label for="{{ $field }}" class="block text-gray-700 font-medium mb-1">{{ $prompt }}</label>
			<input type="text" id="{{ $field }}"name="{{ $field }}" 
class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none" 				
				value = "{{ old($field, $model) }}"
				{{-- :value="old('price', $product->price ?? '')" --}}
	/>
</div>

{{-- value="{{ old('code', $product->code ?? '') }}" --}}