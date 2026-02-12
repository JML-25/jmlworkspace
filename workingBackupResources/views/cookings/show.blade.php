<x-layout>
<div class="container">
    <div class="text-2xl/7 font-bold text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight mb-5 text-center">
		<h3>Détails de la recette</h3>
	</div>
    <div class="border rounded p-5  bg-amber-50"> <p><strong>Nom :</strong> {{ $cooking->name }}</p>
    <p><strong>Description :</strong> {{ $cooking->description }}</p>
    <p><strong>Information :</strong> {{ $cooking->additionalinformation }}</p>
    <p><strong>Status :</strong> {{ $cooking->recipestatus }}</p>
    <p><strong>Type :</strong> {{ $cooking->typeofdish }}</p>
    <p><strong>Difficulty :</strong> {{ $cooking->difficultylevel }}</p>
    <p><strong>Preparation :</strong> {{ $cooking->preparationtime }}</p>
    <p><strong>Cooking :</strong> {{ $cooking->cookingtime }}</p>
    <p><strong>Total time :</strong> {{ $cooking->totaltime }}</p>
    <p><strong>Coût :</strong> {{ $cooking->totalcost }} €</p>
    <p><strong>Servings :</strong> {{ $cooking->servings }}</p>
    <p><strong>Calories :</strong> {{ $cooking->calories }}</p>
    <p><strong>Fat :</strong> {{ $cooking->fat}}</p>
    <p><strong>Carbs :</strong> {{ $cooking->carbs }}</p>
    <p><strong>Proteins :</strong> {{ $cooking->protein }}</p>
    </div>
   
    <div class="mt-5"><a href="{{ route('cookings.edit', $cooking) }}" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Modifier</a>
    <form action="{{ route('cookings.destroy', $cooking) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline cursor-pointer">Supprimer</button>
    </form>
   
		<!-- Lien pour créer un nouvel article : "cookings.create" -->
		<a href="{{ route('cookings.create') }}" title="Créer une recette" class="mb-5 mr-3 text-sm bg-blue-800 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline " >Créer une nouvelle recette</a>
	
    <a href="{{ route('cookings.index') }}" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Retour</a>
</div></div>
    
</x-layout>