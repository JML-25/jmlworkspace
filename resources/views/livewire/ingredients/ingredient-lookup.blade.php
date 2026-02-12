<div
    class="panel"
    x-data="ingredientLookup(@js($items))"
    x-init="wireId = $el.closest('[wire\\:id]').getAttribute('wire:id')"
    x-cloak
>
    <div class="section-title">Ingredient lookup</div>

    {{-- Search input --}}
    <div class="form-row">
        <label class="form-label">Search ingredient</label>
        <input
            type="text"
            class="form-input"
            placeholder="Type at least 2 letters..."
            x-model="query"
            @input="applyFilter()"
        />
    </div>

    {{-- Selected ingredient --}}
    @if ($selectedIngredientId)
        <div class="form-row" style="margin-top: 10px;">
            <strong>Selected:</strong> {{ $selectedIngredientTitle }}

            <x-form.button
                type="button"
                variant="secondary"
                wire:click="clearSelection"
                style="margin-left: 10px;"
            >
                Clear
            </x-form.button>
        </div>
    @endif

    {{-- Results --}}
    <template x-if="filtered.length > 0">
        <div class="hr"></div>
    </template>

    <ul class="lookup-results">
        <template x-for="item in filtered" :key="item.id">
            <li>
                <button
                    type="button"
                    class="btn btn-secondary"
                    @click="Livewire.find(wireId).call('selectIngredient', item.id)"
                >
                    <span x-text="item.title"></span>
                </button>
            </li>
        </template>
    </ul>
</div>
