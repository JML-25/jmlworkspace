<div class="col-span-6 md:col-span-{{ $col }}">
    <!-- inputtext component rendered here -->
	<label for="{{ $field }}" class="block text-gray-700 font-medium mb-1">{{ $prompt }}</label>
			<textarea name="{{ $field }}" id="{{ $field }}" rows="2"
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
		      {{ old($field, $model) }}
			</textarea>

</div>

