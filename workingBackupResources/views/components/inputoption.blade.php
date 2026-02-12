<div class="col-span-{{ $col }} md:col-span-{{ $col }}">
    <!-- inputselect component rendered here -->
	<label for="{{ $field }}" class="block text-gray-700 font-medium mb-1">{{ $prompt }}</label>
			<select name="{{ $field }}" id="{{ $field }}"
				class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
				@foreach (session('applicationselectclauses')[$field] as $option )
                    <option value = "{{$option['internal']  }}"
					 {{ $getSelected($option) }} >{{$option['label']  }}</option>
                @endforeach
				
			</select>
	
</div>