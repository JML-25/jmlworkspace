<div class="flex gap-2 border-b pb-2">
    <button type="button"
            class="px-3 py-2 border rounded {{ $activeTab === 'cooking' ? 'font-semibold' : '' }}"
            wire:click="requestTabChange('cooking')">
        Cooking
    </button>

    <button type="button"
            class="px-3 py-2 border rounded {{ $activeTab === 'ingredients' ? 'font-semibold' : '' }}"
            wire:click="requestTabChange('ingredients')">
        Ingredients
    </button>

    <button type="button"
            class="px-3 py-2 border rounded {{ $activeTab === 'steps' ? 'font-semibold' : '' }}"
            wire:click="requestTabChange('steps')">
        Steps
    </button>
</div>
