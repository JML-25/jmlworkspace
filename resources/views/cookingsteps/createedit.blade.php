<!-- resources/views/recipes/create.blade.php -->
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
            {{$formTitle}} d'une étape pour la recette {{$cooking->name}}
        </h3>
        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="product-modal">
           <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
  </div>
   
		
    
	<form  action="{{ $isEdit ? route('cookingsteps.update', $cookingstep['id']) : route('cookings.cookingsteps.store', $cooking) }}"   method="POST" enctype="multipart/form-data"  class="space-y-4">
	@csrf
  @if($isEdit)
        @method('PUT')
  @endif
	<div class="grid grid-cols-6 gap-6 w-full mt-3">
		  <!-- Ingredient section -->
		<input type="number" id="cooking_id" name="cooking_id" value="{{ $cookingstep['cooking_id'] }}" hidden>
		<x-inputtext :model="$cookingstep['title']" field="title" prompt="Title" col="2"></x-inputtext>
		<x-inputnumber :model="$cookingstep['sequence']"  field="sequence" prompt="Sequence" col="1"></x-inputnumber>
		<x-inputtextarea :model="$cookingstep['instruction']" field="instruction" prompt="Instruction" col="2"></x-inputtext>
		<x-inputoption :model="$cookingstep['tasktype']" field="tasktype" prompt="Type de tâche" col="2"></x-inputoption>
		<x-inputnumber :model="$cookingstep['expectedtime']"  field="expectedtime" prompt="Time" col="1"></x-inputnumber>
    <x-inputtextarea :model="$cookingstep['additionalinformation']" field="additionalinformation" prompt="Additional information" col="2"></x-inputtext>

		  <!-- Bouton -->
		<div class="pt-4 col-span-full" >
			<button type="submit"
						class="w-full bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 transition duration-200">
				  Lancer la {{$buttonprompt}} de l'étape de la recette {{$cooking->title}}
			</button>
		</div>
	</div>
	</form>
 
 </div>
</x-layout>
{{-- @endsection --}}

