<x-layout>
<div class="text-2xl/7  sm:truncate sm:text-3xl sm:tracking-tight mb-5 text-center">
		<x-titretransaction>Liste des étapes de la recette: {{$cooking->name}}</x-titretransaction>
		</p>
</div>




	<!-- Le tableau pour lister les articles/cookings -->
<table class="table-auto border border-gray-400 w-full">
	<thead class="bg-blue-200 text-left ">
		<tr>
			<th class="border-xy border-gray-300 text-blue-900 px-2 ">Title</th>
			<th class="border-xy border-gray-300 text-blue-900 px-2 ">Type</th>
			<th class="border-xy border-gray-300 text-blue-900 px-2 ">Instruction</th>
			<th class="border-xy border-gray-300 text-blue-900 px-2 ">Sequence</th>
			<th class="border-xy border-gray-300 text-blue-900 px-2 ">Time</th>
			<th class="border-xy border-gray-300 px-2  text-right px-2 italic"></th>
		</tr>
	</thead>
	<tbody class = "bg-blue-50">
	@foreach ($cookingsteps as $cookingstep)
			
		<tr class=" border-y hover:bg-green-100 odd:bg-blue-100 even:bg-blue-150 "
				onclick="window.location='{{ route('cookingsteps.show', $cookingstep) }}'" 
                style="cursor:pointer;"
                class="hover:bg-gray-100"
			
		>
			<td class = "px-2 ">{{ $cookingstep->title }}</td>
			<td class = "px-2 ">{{ $cookingstep->tasktype }}</td>
			<td class = "px-2 ">{{ $cookingstep->instruction}}</td>
			<td class = "px-2 ">{{ $cookingstep->sequence}}</td>
			<td class = "px-2 ">{{ $cookingstep->expectedtime}}</td>
			</td>
			
			<td class="">
				<a class="text-blue-400 "href="{{ route('cookingsteps.edit', $cookingstep) }}" >
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
		<!-- Lien pour créer un nouvel article : "cookings.create" -->
		<a href="{{ route('cookings.cookingsteps.create', $cooking) }}" title="Créer une étape" class="mr-3 text-sm bg-blue-800 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline inline-block" >Ajouter une étape à la recette</a>
	</p>
	<div class="border-y pb-5">
		{{ $cookingsteps->links('vendor.pagination.tailwindcopy2') }}
		
	</div>
			

	</div>
	
</x-layout>