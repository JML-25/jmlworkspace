<div class="panel">
  <div class="section-title">Ingredient lookup</div>

  <x-form.input
    label="Search ingredient"
    name="query"
    placeholder="Type at least 2 letters..."
    wire:model.debounce.300ms="query"
  />

  @if($selectedIngredientId)
    <div style="margin-top: 8px;">
      <strong>Selected:</strong> {{ $selectedIngredientTitle }}
      <x-form.button variant="secondary" wire:click="clearSelection" style="margin-left: 10px;">
        Clear
      </x-form.button>
    </div>
  @endif

  @if(count($results) > 0)
    <div class="hr"></div>
    <ul style="list-style: none; padding-left: 0; display: grid; gap: 8px;">
      @foreach($results as $r)
        <li>
          <x-form.button variant="secondary" wire:click="selectIngredient({{ $r['id'] }})">
            {{ $r['title'] }}
          </x-form.button>
        </li>
      @endforeach
    </ul>
  @endif
</div>
