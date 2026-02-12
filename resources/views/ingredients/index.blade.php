<x-layout>
<div class="text-2xl/7  sm:truncate sm:text-3xl sm:tracking-tight mb-5 text-center">
		<x-titretransaction>Liste des ingrédients</x-titretransaction>
</div>




	<!-- Le tableau pour lister les articles/ingredients -->
<table class="table-auto border border-gray-400 w-full">
	<thead class="bg-blue-200 text-left ">
		<tr>
			<th class="border-xy border-gray-300 text-blue-900 px-2 ">Title</th>
			<th class="border-xy border-gray-300 text-blue-900 px-2 ">Description</th>
			<th class="border-xy border-gray-300 text-blue-900 px-2 ">Type</th>
			<th class="border-xy border-gray-300 px-2  text-right px-2 italic"></th>
		</tr>
	</thead>
	<tbody class = "bg-blue-50">
	@foreach ($ingredients as $ingredient)
			
		<tr class=" border-y hover:bg-green-100 odd:bg-blue-100 even:bg-blue-150 "
				onclick="window.location='{{ route('ingredients.show', $ingredient) }}'" 
                style="cursor:pointer;"
                class="hover:bg-gray-100"
			
		>
			<td class = "px-2 ">{{ $ingredient->title }}</td>
			<td class = "px-2 ">{{ $ingredient->description}}</td>
			<td class = "px-2 ">{{ $ingredient->ingredienttype}}</td>
			
			<td class="">
				<a class="text-blue-400 "href="{{ route('ingredients.edit', $ingredient) }}" >
					<div class="flex items-center justify-end px-2">
						<x-icons.edit class="text-blue-500 hover:text-blue-700 " />
					</div>
				</a>
			</td>
		</tr>
			
	@endforeach
  </tbody>
</table>

			
	<p class="text-center my-5">
		<!-- Lien pour créer un nouvel article : "ingredients.create" -->
		<a href="{{ route('ingredients.create') }}" title="Créer un ingrédient" class="mr-3 text-sm bg-blue-800 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline inline-block" >Créer une nouvel ingrédient</a>
	</p>
	<div class="border-y pb-5">
		{{ $ingredients->links('vendor.pagination.tailwindcopy2') }}
		
	</div>
			

	</div>
	
</x-layout>