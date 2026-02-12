<?php

namespace App\Livewire\Cookings;

use App\Models\Cooking;
use Livewire\Attributes\On;
use Livewire\Component;

class CookingEditor extends Component
{
    public string $activeTab = 'cooking';
    public ?Cooking $cooking = null;

    public function mount(?Cooking $cooking = null): void
    {
        $this->cooking = $cooking;
        $this->activeTab = 'cooking';
    }

    public function switchTab(string $tabKey): void
    {
        $allowed = ['cooking', 'ingredients', 'steps'];
        if (!in_array($tabKey, $allowed, true)) {
            return;
        }

        $this->activeTab = $tabKey;
    }

    public function refreshCooking(int $id): void
    {
        $this->cooking = Cooking::query()->find($id);
    }

    #[On('cookingSaved')]
    public function handleCookingSaved(int $id): void
    {
        $this->refreshCooking($id);
    }

    #[On('cookingDeleted')]
    public function handleCookingDeleted(int $id): void
    {
        $this->cooking = null;
        $this->activeTab = 'cooking';
    }

    public function render()
    {
        return view('livewire.cookings.cooking-editor');
    }
}
