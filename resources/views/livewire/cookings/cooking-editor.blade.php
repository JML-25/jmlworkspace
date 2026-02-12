<div>
  <x-form.tabs
    :tabs="['cooking' => 'Cooking', 'ingredients' => 'Ingredients', 'steps' => 'Steps']"
    :active="$activeTab"
  />

  @if($activeTab === 'cooking')
    <livewire:cookings.cooking-tab :cooking="$cooking" 
	:key="'cooking-tab-'.($cooking?->id ?? 'new')"
	/>
  @endif

  @if($activeTab === 'ingredients')
    <livewire:cookings.ingredients-tab :cooking="$cooking" 
	:key="'ingredients-tab-'.($cooking?->id ?? 'new')"
	/>
  @endif

  @if($activeTab === 'steps')
    <livewire:cookings.steps-tab :cooking="$cooking" 
	:key="'steps-tab-'.($cooking?->id ?? 'new')"
	/>
  @endif
</div>
