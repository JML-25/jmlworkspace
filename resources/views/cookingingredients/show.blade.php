<x-layout>

<div class="container">
    <div class="text-2xl/7 font-bold text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight mb-5 text-center">
		<h3>Détails de l'ingredient de  la recette {{$cooking->name}}</h3>
	</div>
    <div class="border rounded p-5  bg-amber-50"> <p><strong>Title :</strong> {{ $cookingingredient->title }}</p>
    <p><strong>Description :</strong> {{ $cookingingredient->ingredientdescription }}</p>
    <p><strong>Instruction :</strong> {{ $cookingingredient->instruction }}</p>
    <p><strong>Sequence :</strong> {{ $cookingingredient->sequence}}</p>
    <p><strong>Quantity :</strong> {{ $cookingingredient->quantity }}</p>
	<p><strong>Unit :</strong> {{ $cookingingredient->unit }}</p>
	<p><strong>Ingrédient id:</strong> {{ $ingredient->id }}</p>
	<p><strong>Ingrédient  title:</strong> {{ $ingredient->title }}</p>
    </div>
   
    <div class="mt-5"><a href="{{ route('cookingingredients.edit', $cookingingredient) }}" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Modifier</a>
    <form action="{{ route('cookingingredients.destroy', $cookingingredient) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline cursor-pointer">Supprimer</button>
    </form>
   
		<!-- Lien pour créer un nouvel article : "cookingingredients.create" -->
		<a href="{{ route('cookings.cookingingredients.create', $cooking) }}" title="Ajouter un ingrédient" class="mb-5 mr-3 text-sm bg-blue-800 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline " >Ajouter un ingrédient</a>
	
    <a href="{{ route('cookings.cookingingredients.index', $cooking) }}" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Retour</a>
</div></div>
    
</x-layout>