<div class="col-span-{{ $col }} md:col-span-{{ $col }}">
    <!-- inputnumber component rendered here -->
			<label for="sequence" class="block text-gray-700 font-medium mb-1">{{$prompt}}</label>
			<input type="number" id="{{$field}}" name="{{$field}}" 
				class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none"
				value = "{{ old($field, $model) }}"

			>
			   
		</div >