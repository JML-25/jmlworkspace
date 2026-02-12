<x-layout>
<livewire:cookings.cookingsearch/>
	

<div class="text-2xl/7 font-bold text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight mb-5 text-center">
		<h3>Liste des recettes</h3>
	</div>
<div class = "flex justify-center">
<div>


	<!-- Le tableau pour lister les articles/cookings -->
				<!-- On parcourt la collection de Post -->
			@foreach ($cookings as $cooking)
			
			<div class=" border-y hover:bg-green-100 bg-amber-50 flex items-center justify-between">
				<div class="p-3 px-5">
					
					<!-- Lien pour afficher un Cooking : "cookings.show" -->
					<a href="{{ route('cookings.show', $cooking) }}" title="Voir la recette">{{ $cooking->name }}</a>
					<p class="inline-block"> / {{ $cooking->description}}</p>
					<p class="inline-block"> / {{ $cooking->recipestatus}}</p>
					
				</div>
				<div class="p-3 px-5">
					<!-- Formulaire pour modifier un Post : "cookings.edit" -->
					
					<a href="{{ route('cookings.edit', $cooking) }}" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2  focus:outline-none focus:shadow-outline">Modifier</a>
					
				</div>
			</div>
			
			@endforeach
	<p class="text-center my-5">
		<!-- Lien pour créer un nouvel article : "cookings.create" -->
		<a href="{{ route('cookings.create') }}" title="Créer une recette" class="mr-3 text-sm bg-blue-800 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline inline-block" >Créer une nouvelle recette</a>
	</p>
	<div class="border-y pb-5">
		{{ $cookings->links('vendor.pagination.tailwindcopy2') }}
		
	</div>
			
	</div>		
	</div>
	
</x-layout>