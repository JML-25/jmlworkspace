<x-layout>
<div class="text-2xl/7 font-bold text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight mb-5 text-center">
		<h3>Liste des application codes</h3>
	</div>
<div class = "flex justify-center">
<div>


	<!-- Le tableau pour lister les application codes -->
				<!-- On parcourt la collection de Post -->
			@foreach ($applicationcodes as $applicationcode)
			
			<div class=" border-y hover:bg-green-100 bg-amber-50 flex items-center justify-between">
				<div class="p-3 px-5">
					
					<!-- Lien pour afficher un Application code : "applicationcodes.show" -->
					<a href="{{ route('applicationcodes.show', $applicationcode) }}" title='Voir l application code'>{{ $applicationcode->table }}
					<p class="inline-block"> / {{ $applicationcode->code}}</p>
					<p class="inline-block"> / {{ $applicationcode->sequence}}</p>
					<p class="inline-block"> / {{ $applicationcode->label}}</p>
					<p class="inline-block"> / {{ $applicationcode->internal}}</p>
					</a>
				</div>
				<div class="p-3 px-5">
					<!-- Formulaire pour modifier un Post : "cookings.edit" -->
					
					<a href="{{ route('applicationcodes.edit', $applicationcode) }}" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Modifier</a>
					
				</div>
			</div>
			
			@endforeach
	<p class="text-center my-5">
		<!-- Lien pour créer un nouvel application code : "applicationcodes.create" -->
		<a href="{{ route('applicationcodes.create') }}" title="Créer une recette" class="mr-3 text-sm bg-blue-800 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline inline-block" >Créer un application code</a>
	</p>
	<div class="border-y pb-5">
		{{ $applicationcodes->links('vendor.pagination.tailwindcopy2') }}
		
	</div>
			
	</div>		
	</div>
	
</x-layout>