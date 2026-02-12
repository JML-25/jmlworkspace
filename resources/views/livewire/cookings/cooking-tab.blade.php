<div class="panel">
@if($successMessage)
  <div
    x-data="{ show: true }"
    x-init="setTimeout(() => show = false, 2500)"
    x-show="show"
    class="alert alert-success"
  >
    {{ $successMessage }}
  </div>
@endif


  <div class="section-title">Cooking</div>

  <div class="form-grid">
    <x-form.input label="Name" name="name" required wire:model.blur="name" />

    <x-form.select
      label="Recipe status"
      name="recipestatus"
      :options="$selectRecipeStatus"
      wire:model="recipestatus"
    />

    <x-form.select
      label="Type of dish"
      name="typeofdish"
      :options="$selectTypeOfDish"
      wire:model="typeofdish"
    />

    <x-form.select
      label="Difficulty level"
      name="difficultylevel"
      :options="$selectDifficulty"
      wire:model="difficultylevel"
    />
  </div>

  <div class="hr"></div>

  {{-- text columns => textarea --}}
  <div class="form-grid-1">
    <x-form.textarea label="Description" name="description" rows="4" wire:model.blur="description" />
    <x-form.textarea label="Additional information" name="additionalinformation" rows="4" wire:model.blur="additionalinformation" />
  </div>

  <div class="hr"></div>

  <div class="form-grid">
    <x-form.input label="Preparation time" name="preparationtime" type="number" wire:model.blur="preparationtime" />
    <x-form.input label="Cooking time" name="cookingtime" type="number" wire:model.blur="cookingtime" />
    <x-form.input label="Total time" name="totaltime" type="number" wire:model.blur="totaltime" />
    <x-form.input label="Servings" name="servings" type="number" wire:model.blur="servings" />
    <x-form.input label="Calories" name="calories" type="number" wire:model.blur="calories" />
    <x-form.input label="Fat" name="fat" type="number" wire:model.blur="fat" />
    <x-form.input label="Carbs" name="carbs" type="number" wire:model.blur="carbs" />
    <x-form.input label="Protein" name="protein" type="number" wire:model.blur="protein" />
    <x-form.input label="Total cost" name="totalcost" type="number" step="0.01" wire:model.blur="totalcost" />
  </div>

  <div class="hr"></div>

  <div style="display:flex; gap: 10px;">
    <x-form.button variant="primary" wire:click="save">Save</x-form.button>
    @if($cooking)
      <x-form.button variant="danger" wire:click="delete">Delete</x-form.button>
    @endif
  </div>

  @if(!$cooking)
    <div style="margin-top: 10px; opacity: 0.8;">
      Create the Cooking first, then you can add ingredients and steps.
    </div>
  @endif

</div>
