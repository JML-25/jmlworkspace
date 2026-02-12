<x-layout>
<div class="text-2xl/7 font-bold text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight mb-5 text-center">
		<h3>Liste des ingrédients</h3>
	</div>
<div class = "flex justify-center">
<div>


	<!-- Le tableau pour lister les articles/ingredients -->
				<!-- On parcourt la collection de Post -->
			@foreach ($ingredients as $ingredient)
			
			<div class=" border-y hover:bg-green-100 bg-amber-50 flex items-center justify-between">
				<div class="p-3 px-5">
					
					<!-- Lien pour afficher un Ingredient : "ingredients.show" -->
					<a href="{{ route('ingredients.show', $ingredient) }}" title="Voir l'ingrédient">{{ $ingredient->title }}
					<p class="inline-block"> / {{ $ingredient->description}}</p>
					<p class="inline-block"> / {{ $ingredient->ingredienttype}}</p>
					</a>
				</div>
				<div class="p-3 px-5">
					<!-- Formulaire pour modifier un Post : "ingredients.edit" -->
					
					<a href="{{ route('ingredients.edit', $ingredient) }}" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2  focus:outline-none focus:shadow-outline">Modifier</a>
					
				</div>
			</div>
			
			@endforeach
	<p class="text-center my-5">
		<!-- Lien pour créer un nouvel article : "ingredients.create" -->
		<a href="{{ route('ingredients.create') }}" title="Créer un ingrédient" class="mr-3 text-sm bg-blue-800 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline inline-block" >Créer une nouvel ingrédient</a>
	</p>
	<div class="border-y pb-5">
		{{ $ingredients->links('vendor.pagination.tailwindcopy2') }}
		
	</div>
			
	</div>		
	</div>
	
</x-layout>