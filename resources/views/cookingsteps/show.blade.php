<x-layout>

<div class="container">
    <div class="text-2xl/7 font-bold text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight mb-5 text-center">
		<h3>Détails de l'étape de  la recette {{$cooking->name}}</h3>
	</div>
		<div class="border rounded p-5  bg-amber-50"> <p><strong>Title :</strong> {{ $cookingstep->title }}</p>
		<p><strong>Instruction :</strong> {{ $cookingstep->instruction }}</p>
		<p><strong>Sequence :</strong> {{ $cookingstep->sequence}}</p>
		<p><strong>Type :</strong> {{ $cookingstep->tasktype }}</p>
		<p><strong>Time :</strong> {{ $cookingstep->expectedtime }}</p>
    </div>
   
    <div class="mt-5"><a href="{{ route('cookingsteps.edit', $cookingstep) }}" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Modifier</a>
    <form action="{{ route('cookingsteps.destroy', $cookingstep) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline cursor-pointer">Supprimer</button>
    </form>
   
		<!-- Lien pour créer un nouvel article : "cookingsteps.create" -->
		<a href="{{ route('cookings.cookingsteps.create', $cooking) }}" title="Ajouter une étape" class="mb-5 mr-3 text-sm bg-blue-800 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline " >Ajouter une étape</a>
	
    <a href="{{ route('cookings.cookingsteps.index', $cooking) }}" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Retour</a>
</div></div>
    
</x-layout>