<x-layout>
<div class="container">
    <div class="text-2xl/7 font-bold text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight mb-5 text-center">
		<h3>Détails de l'ingrédient</h3>
	</div>
    <div class="border rounded p-5  bg-amber-50"> <p><strong>Nom :</strong> {{ $ingredient->title }}</p>
    <p><strong>Description :</strong> {{ $ingredient->description }}</p>
    <p><strong>Type :</strong> {{ $ingredient->ingredienttype }}</p>
  
    </div>
   
    <div class="mt-5"><a href="{{ route('ingredients.edit', $ingredient) }}" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Modifier</a>
    <form action="{{ route('ingredients.destroy', $ingredient) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline cursor-pointer">Supprimer</button>
    </form>
   
		<!-- Lien pour créer un nouvel ingrédient : "ingredients.create" -->
		<a href="{{ route('ingredients.create') }}" title="Créer une recette" class="mb-5 mr-3 text-sm bg-blue-800 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline " >Créer un nouvel ingrédient</a>
	
    <a href="{{ route('ingredients.index') }}" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Retour</a>
</div></div>
    
</x-layout>