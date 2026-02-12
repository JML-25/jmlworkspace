<div class="panel">
  <div class="section-title">Ingredients</div>

  @if(!$cooking)
    <div>Create the Cooking first.</div>
  @else
    <div class="form-grid">
      <div>
        <livewire:ingredients.ingredient-lookup />
      </div>

      <div>
        <div class="section-title">{{ $editingId ? 'Edit ingredient line' : 'Add ingredient line' }}</div>

        <div class="form-grid-1">
          <x-form.input label="Sequence" name="sequence" type="number" wire:model.blur="sequence" />

          <x-form.input label="Title" name="title" wire:model.blur="title" />
          <x-form.input label="Ingredient description" name="ingredientdescription" wire:model.blur="ingredientdescription" />

          <div class="form-grid">
            <x-form.input label="Quantity" name="quantity" type="number" step="0.01" wire:model.blur="quantity" />
            <x-form.select label="Unit" name="unit" :options="$selectUnit" wire:model="unit" />
          </div>

          <x-form.input label="Instruction" name="instruction" wire:model.blur="instruction" />
        </div>

        <div class="hr"></div>

        <div style="display:flex; gap: 10px;">
          <x-form.button variant="primary" wire:click="save">Save line</x-form.button>
          <x-form.button variant="secondary" wire:click="startCreate">Clear</x-form.button>
        </div>

        <div style="margin-top: 10px; opacity: 0.8;">
          Ingredient id (selected): {{ $ingredient_id ?? 'none' }}
        </div>
      </div>
    </div>

    <div class="hr"></div>

    <div class="section-title">Current ingredients</div>
    <table style="width:100%; border-collapse: collapse;">
      <thead>
        <tr style="text-align:left; border-bottom: 1px solid #eee;">
          <th style="padding:8px;">Seq</th>
          <th style="padding:8px;">Title</th>
          <th style="padding:8px;">Qty</th>
          <th style="padding:8px;">Unit</th>
          <th style="padding:8px;">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($rows as $r)
          <tr style="border-bottom: 1px solid #f3f3f3;">
            <td style="padding:8px;">{{ $r['sequence'] }}</td>
            <td style="padding:8px;">{{ $r['title'] }}</td>
            <td style="padding:8px;">{{ $r['quantity'] }}</td>
            <td style="padding:8px;">{{ $r['unit'] }}</td>
            <td style="padding:8px; display:flex; gap:8px;">
              <x-form.button variant="secondary" wire:click="startEdit({{ $r['id'] }})">Edit</x-form.button>
              <x-form.button variant="danger" wire:click="delete({{ $r['id'] }})">Delete</x-form.button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @endif
</div>
