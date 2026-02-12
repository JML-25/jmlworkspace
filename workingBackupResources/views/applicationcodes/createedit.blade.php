<!-- create an application code -->
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
            {{$formTitle}} d'un élément de <span style = "font-style: italic">application code</span>
        </h3>
        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="product-modal">
           <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
   
  
    <form  action="{{ $isEdit ? route('applicationcodes.update', $applicationcode) : route('applicationcodes.store') }}"   method="POST" enctype="multipart/form-data"  class="space-y-4">



	@csrf
  @if($isEdit)
        @method('PUT')
  @endif
  <div class="grid grid-cols-6 gap-6 w-full mt-3">


	<x-inputtext :model="$applicationcode['table']" field="table" prompt="Table" col="2"></x-inputtext>
	
	<x-inputtext :model="$applicationcode['code']"  field="code" prompt="Code" col="2"></x-inputtext>
	<x-inputnumber :model="$applicationcode['sequence']"  field="sequence" prompt="Sequence" col="2"></x-inputnumber>
	<x-inputtext :model="$applicationcode['label']"  field="label" prompt="Label" col="2"></x-inputtext>
	<x-inputtext :model="$applicationcode['internal']"  field="internal" prompt="Internal" col="2"></x-inputtext>
      <!-- Bouton -->
		<div class="pt-4 col-span-full" >
			<button type="submit"
				class="w-full bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 transition duration-200">
          Lancer la {{$buttonprompt}} de l'élément
			</button>
		</div>
	</div>
    </form>
  </div>

{{-- @endsection --}}
</x-layout>