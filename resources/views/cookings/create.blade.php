<!-- resources/views/recipes/create.blade.php -->

}

<x-layout>

<div class="max-w-800 p-4 bg-white rounded-2xl shadow-lg">
  <div class="flex items-start justify-between pb-2 border-b rounded-t">
        <h3 class="text-xl font-semibold">
            Création d'une recette
        </h3>
        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="product-modal">
           <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
   
    
    <form action="{{ route('cookings.store') }}"  method="POST"   enctype="multipart/form-data"  class="space-y-4">
	@csrf
      <div class="grid grid-cols-6 gap-6 w-full mt-3">
      <!-- Nom -->
      <div class="col-span-6">
        <label for="name" class="block text-gray-700 font-medium mb-1">Title</label>
        <input type="text" id="name" name="name" required
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none" 
						value="{{ old('name') }}">
               
      </div>

      <!-- Email -->
      <div class="col-span-6 sm:col-span-3" >
        <label for="description" class="block text-gray-700 font-medium mb-1">Description</label>
         <textarea name="description" id="description" rows="2"
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
		      {{ old('description') }}
          </textarea>
      </div>
	  <div class="col-span-6 sm:col-span-3" >
        <label for="email" class="block text-gray-700 font-medium mb-1">Additional information</label>
         <textarea name="additionalinformation" id="additionalinformation" rows="2"
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
		      {{ old('additionalinformation') }}
          </textarea>
      </div>
	  <div class="col-span-2 sm:col-span-1">
        <label for="recipestatus" class="block text-gray-700 font-medium mb-1">Recipe status</label>
        <select name="recipestatus" id="recipestatus"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                    <option value="draft">Draft</option>
                    <option value="public">Public</option>
                    <option value="private">Private</option>
        </select>
      </div>
	  <div class="col-span-2 sm:col-span-1">
        <label for="typeofdish" class="block text-gray-700 font-medium mb-1">Type of dish</label>
        <select name="typeofdish" id="typeofdish"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                    <option value="entrée">Entrée</option>
                    <option value="prncpal">Principal</option>
                    <option value="dessert">Dessert</option>
                    <option value="autres">Autres</option>
        </select>
      </div>
	  <div class="col-span-2 sm:col-span-1">
        <label for="difficultylevel" class="block text-gray-700 font-medium mb-1">Difficulty level</label>
        <select name="difficultylevel" id="difficultylevel"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                    <option value="easy">Easy</option>
                    <option value="medium">Medium</option>
                    <option value="hard">Hard</option>
        </select>
	  </div>
	  <div class="col-span-2 sm:col-span-1">
        <label for="preparationtime" class="block text-gray-700 font-medium mb-1">Preparation time</label>
        <input type="number" id="preparationtime" name="preparationtime" 
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none"
				value="{{ old('preparationtime') }}">
			   
      </div >
	  <div class="col-span-2 sm:col-span-1">
        <label for="cookingtime" class="block text-gray-700 font-medium mb-1">Cooking time</label>
        <input type="number" id="cookingtime" name="cookingtime" 
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none"
			   value="{{ old('cookingtime') }}">
      </div>
	  <div class="col-span-2 sm:col-span-1">
        <label for="totaltime" class="block text-gray-700 font-medium mb-1">Total time</label>
        <input type="number" id="totaltime" name="totaltime" 
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none"
			   value="{{ old('totaltime') }}">
      </div>
	   <div class="col-span-2 sm:col-span-1">
        <label for="servings" class="block text-gray-700 font-medium mb-1">Servings</label>
        <input type="number" id="servings" name="servings" 
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none"
			   value="{{ old('servings') }}">
      </div>
	   <div class="col-span-2 sm:col-span-1">
        <label for="calories" class="block text-gray-700 font-medium mb-1">Calories</label>
        <input type="number" id="calories" name="calories" 
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none"
			   value="{{ old('calories') }}">
      </div>
	   <div class="col-span-2 sm:col-span-1">
        <label for="fat" class="block text-gray-700 font-medium mb-1">Fat</label>
        <input type="number" id="fat" name="fat" 
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none"
			   value="{{ old('fat') }}">
      </div>
	   <div class="col-span-2 sm:col-span-1">
        <label for="carbs" class="block text-gray-700 font-medium mb-1">Carbs</label>
        <input type="number" id="carbs" name="carbs" 
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none"
			   value="{{ old('carbs') }}">
      </div>
	   <div  class="col-span-2 sm:col-span-1">
        <label for="protein" class="block text-gray-700 font-medium mb-1">Protein</label>
        <input type="number" id="protein" name="protein" 
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none"
			   value="{{ old('protein') }}">
      </div>
	  <div class="col-span-2 sm:col-span-1">
        <label for="totalcost" class="block text-gray-700 font-medium mb-1">Total cost</label>
        <input type="number" id="totalcost" name="totalcost" 
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none"
			   value="{{ old('totalcost') }}">
      </div>
      



      <!-- Bouton -->
      <div class="pt-4 col-span-full" >
        <button type="submit"
                class="w-full bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 transition duration-200">
          Lancer la création de le recette
        </button>
      </div>
	  </div>
    </form>
  </div>

{{-- @endsection --}}
</x-layout>