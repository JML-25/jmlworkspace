<?php

namespace App\Livewire\Cookings\Parts;

use Illuminate\Contracts\View\View;
use Livewire\Component;

final class CookingTabs extends Component
{
    public string $activeTab = 'cooking';

    public function render(): View
    {
        return view('livewire.cookings.parts.cooking-tabs');
    }

    public function requestTabChange(string $tab): void
    {
        $this->dispatch('tab-changed', tab: $tab);
    }
}
