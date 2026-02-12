<div class="p-6 space-y-4">
    <div class="flex items-center justify-between gap-3">
        <div>
            <div class="text-xl font-bold">
                {{ $cookingId ? "Edit Cooking #{$cookingId}" : "Create Cooking" }}
            </div>
            @if (session('status'))
                <div class="text-sm text-green-700">{{ session('status') }}</div>
            @endif
        </div>

        <div class="flex gap-2">
            <button type="button" class="border rounded px-3 py-2" wire:click="save">Save</button>

            @if($cookingId)
                <button type="button" class="border rounded px-3 py-2" wire:click="askDeleteCooking">Delete</button>
            @endif
        </div>
    </div>

    <livewire:cookings.parts.cooking-tabs
        :active-tab="$activeTab"
        wire:key="cooking-tabs-{{ $cookingId ?? 'new' }}" />

    @if($confirmingDeleteCooking)
        <div class="border rounded p-4 bg-red-50 space-y-3">
            <div class="font-semibold text-red-800">Delete this cooking?</div>
            <div class="flex gap-2">
                <button type="button" class="border rounded px-3 py-2" wire:click="deleteCooking">
                    Yes, delete
                </button>
                <button type="button" class="border rounded px-3 py-2" wire:click="cancelDeleteCooking">
                    Cancel
                </button>
            </div>
        </div>
    @endif

    @error('cookingingredients') <div class="text-sm text-red-700">{{ $message }}</div> @enderror
    @error('cookingsteps') <div class="text-sm text-red-700">{{ $message }}</div> @enderror

    @if($activeTab === 'cooking')
        <livewire:cookings.parts.cooking-fields-form
            :name="$name"
            :description="$description"
            :additionalinformation="$additionalinformation"
            :recipestatus="$recipestatus"
            :typeofdish="$typeofdish"
            :difficultylevel="$difficultylevel"
            :preparationtime="$preparationtime"
            :cookingtime="$cookingtime"
            :totaltime="$totaltime"
            :servings="$servings"
            :calories="$calories"
            :fat="$fat"
            :carbs="$carbs"
            :protein="$protein"
            :totalcost="$totalcost"
            wire:key="cooking-fields-{{ $cookingId ?? 'new' }}" />
    @endif

    @if($activeTab === 'ingredients')
        <livewire:cookings.parts.cookingingredients-editor
            :cookingingredients="$cookingingredients"
            wire:key="cookingingredients-editor-{{ $cookingId ?? 'new' }}" />
    @endif

    @if($activeTab === 'steps')
        <livewire:cookings.parts.cookingsteps-editor
            :cookingsteps="$cookingsteps"
            wire:key="cookingsteps-editor-{{ $cookingId ?? 'new' }}" />
    @endif
</div>
