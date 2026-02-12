<!-- resources/views/recipes/create.blade.php -->



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
            {{$formTitle}} d'un ingrédient pour la recette {{$cooking->name}}
        </h3>
        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="product-modal">
           <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
  </div>
   
		
    
	<form  action="{{ $isEdit ? route('cookingingredients.update', $cookingingredient['id']) : route('cookings.cookingingredients.store', $cooking) }}"   method="POST" enctype="multipart/form-data"  class="space-y-4">
	@csrf
  @if($isEdit)
        @method('PUT')
  @endif
      <div class="grid grid-cols-6 gap-6 w-full mt-3">
      <!-- Ingredient section -->
        <div class="flex items-center md:col-span-6">
          
          <div class=" flex items-center"> 
            <label class="text-gray-700 font-medium mb-1">Selected ingredient</label>
            <div class="m-3">
				<button type="button"
                    wire:click="$dispatch('opencookingsearch')"
                    class="px-1 py-1 bg-blue-200  rounded inline"
				>
                    search
				</button>
			</div>
			<input type="text" id="ingredient_title" name="ingredient_title" wire:model="ingredient_title">
			<input type="number" id="cooking_id" name="cooking_id" wire:model="cooking_id" hidden>
			<input type="number" id="ingredient_id" name="ingredient_id" wire:model="ingredient_id" hidden>
          
		  </div>
         
			
			<div class="m-5 bg-grey-400">
				<livewire:cookings.cookingsearch />
			</div>
		</div>

       
	
	<x-inputtext :model="$cookingingredient['title']" field="title" prompt="Title" col="2"></x-inputtext>
	<x-inputtextarea :model="$cookingingredient['ingredientdescription']" field="ingredientdescription" prompt="Description" col="2"></x-inputtext>
	<x-inputtextarea :model="$cookingingredient['instruction']" field="instruction" prompt="Instruction" col="2"></x-inputtext>
	<x-inputnumber :model="$cookingingredient['sequence']"  field="sequence" prompt="Sequence" col="1"></x-inputnumber>
	<x-inputnumber :model="$cookingingredient['quantity']"  field="quantity" prompt="Quantity" col="1"></x-inputnumber>
	<x-inputtext :model="$cookingingredient['unit']" field="unit" prompt="Unit" col="2"></x-inputtext>
	
      <!-- Bouton -->
  <div class="pt-4 col-span-full" >
    <button type="submit"
                class="w-full bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 transition duration-200">
          Lancer la {{$buttonprompt}} de l'ingredient de la recette {{$cooking->title}}
    </button>
  </div>
	</div>
  </form>
 
  </div>

{{-- @endsection --}}

