<x-layout>
<div class="container">
    <div class="text-2xl/7 font-bold text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight mb-5 text-center">
		<h3>Détails de l'application code</h3>
	</div>
    <div class="border rounded p-5  bg-amber-50"> <p><strong>Table :</strong> {{ $applicationcode->table }}</p>
    <p><strong>Code :</strong> {{ $applicationcode->code }}</p>
    <p><strong>Sequence :</strong> {{ $applicationcode->sequence }}</p>
    <p><strong>Label :</strong> {{ $applicationcode->label }}</p>
    <p><strong>Internal :</strong> {{ $applicationcode->internal }}</p>
    
    </div>
   
    <div class="mt-5"><a href="{{ route('applicationcodes.edit', $applicationcode) }}" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Modifier</a>
    <form action="{{ route('applicationcodes.destroy', $applicationcode) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline cursor-pointer">Supprimer</button>
    </form>
   
		<!-- Lien pour créer un nouvel article : "applicationcodes.create" -->
		<a href="{{ route('applicationcodes.create') }}" title="Créer une recette" class="mb-5 mr-3 text-sm bg-blue-800 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline " >Créer un application code</a>
	
    <a href="{{ route('applicationcodes.index') }}" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Retour</a>
</div></div>
    
</x-layout>