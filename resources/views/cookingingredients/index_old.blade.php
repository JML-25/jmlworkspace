<x-layout>
<div class="text-2xl/7 font-bold text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight mb-5 text-center">
		<h3>Liste des ingrédients de la recette</h3>
		<p>{{$cooking->name}}</p>
	</div>
<div class = "flex justify-center">
<div>


	<!-- Le tableau pour lister les articles/ingredientcookings -->
				<!-- On parcourt la collection de Post -->
			@foreach ($cookingingredients as $cookingingredient)
			
			<div class=" border-y hover:bg-green-100 bg-amber-50 flex items-center justify-between">
				<div class="p-3 px-5">
					
					<!-- Lien pour afficher un Cooking : "ingredientcookings.show" -->
					<a href="{{ route('cookingingredients.show', $cookingingredient) }}" title="Voir l'ingrédient">{{ $cookingingredient->title }}
					<p class="inline-block"> / {{ $cookingingredient->ingredientdescription}}</p>
					<p class="inline-block"> / {{ $cookingingredient->instruction}}</p>
					<p class="inline-block"> / {{ $cookingingredient->sequence}}</p>
					<p class="inline-block"> / {{ $cookingingredient->ingredient_id}}</p>
					</a>
				</div>
				<div class="p-3 px-5">
					<!-- Formulaire pour modifier un Post : "ingredientcookings.edit" -->
					
					<a href="{{ route('cookingingredients.edit', $cookingingredient) }}" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2  focus:outline-none focus:shadow-outline">Modifier</a>
					
				</div>
			</div>
			
			@endforeach
	<p class="text-center my-5">
		<!-- Lien pour créer un nouvel article : "ingredientcookings.create" -->
		<a href="{{ route('cookings.cookingingredients.create', $cooking) }}" title="Créer un nouvel ingrédient sur la recette" class="mr-3 text-sm bg-blue-800 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline inline-block" >Créer un nouvel ingrédient sur la recette</a>
	</p>
	<div class="border-y pb-5">
		{{ $cookingingredients->links('vendor.pagination.tailwindcopy2') }}
		
	</div>
			
	</div>		
	</div>
	
</x-layout>