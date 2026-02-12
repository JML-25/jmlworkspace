<x-layout>
  <div
  x-data="{ tab: 'cooking' }"
>
  <div class="tabs">
    <button type="button" class="tab" :class="tab==='cooking' ? 'tab-active' : ''" @click="tab='cooking'">
      Cooking
    </button>
    <button type="button" class="tab" :class="tab==='ingredients' ? 'tab-active' : ''" @click="tab='ingredients'">
      Ingredients
    </button>
    <button type="button" class="tab" :class="tab==='steps' ? 'tab-active' : ''" @click="tab='steps'">
      Steps
    </button>
  </div>

  <div x-show="tab==='cooking'" x-cloak>
    <livewire:cookings.cooking-tab
      :cooking="$cooking"
      :key="'cooking-tab-'.($cooking?->id ?? 'new')"
    />
  </div>

  <div x-show="tab==='ingredients'" x-cloak>
    <livewire:cookings.ingredients-tab
      :cooking="$cooking"
      :key="'ingredients-tab-'.($cooking?->id ?? 'new')"
    />
  </div>

  <div x-show="tab==='steps'" x-cloak>
    <livewire:cookings.steps-tab
      :cooking="$cooking"
      :key="'steps-tab-'.($cooking?->id ?? 'new')"
    />
  </div>
</div>

</x-layout>
