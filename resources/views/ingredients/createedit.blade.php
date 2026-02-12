<!-- resources/views/ingredients/create.blade.php -->


<x-layout>
  @php
 if($isEdit)
      {
        $formTitle="Modification";
        $buttonprompt="modification";
        
    }
  else 
      {
        $formTitle="Création";
        $buttonprompt="création"
      ;}
  @endphp

<div class="max-w-800 p-4 bg-white rounded-2xl shadow-lg">
  <div class="flex items-start justify-between pb-2 border-b rounded-t">
        <h3 class="text-xl font-semibold">
            {{$formTitle}} d'un ingrédient
        </h3>
        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="product-modal">
           <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
  </div>
   
    
	<form  action="{{ $isEdit ? route('ingredients.update', $ingredient) : route('ingredients.store') }}"   method="POST" enctype="multipart/form-data"  class="space-y-4">
	@csrf
  @if($isEdit)
        @method('PUT')
  @endif
      <div class="grid grid-cols-6 gap-6 w-full mt-3">
      <!-- Nom -->
	<x-inputtext :model="$ingredient['title']" field="title" prompt="Title" col="2"></x-inputtext>
	<x-inputtextarea :model="$ingredient['description']" field="description" prompt="Description" col="2"></x-inputtext>
	<x-inputoption :model="$ingredient['ingredienttype']" field="ingredienttype" prompt="Type d'ingrédient" col="2"></x-inputoption>

      <!-- Bouton -->
  <div class="pt-4 col-span-full" >
    <button type="submit"
                class="w-full bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 transition duration-200">
          Lancer la {{$buttonprompt}} de l'ingrédient
    </button>
  </div>
	</div>
  </form>
  </div>

{{-- @endsection --}}
</x-layout>