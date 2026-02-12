<?php

namespace App\Livewire\Cookings;

use App\Models\Cooking;
use Illuminate\Contracts\View\View;
use Livewire\Component;

final class CookingIndex extends Component
{
    public string $search = '';

    public function render(): View
    {
        $cookings = Cooking::query()
            ->when($this->search !== '', function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%');
            })
            ->orderByDesc('updated_at')
            ->limit(50)
            ->get(['id', 'name', 'updated_at']);

        return view('livewire.cookings.cooking-index', [
            'cookings' => $cookings,
        ]);
    }

    public function selectCooking(int $cookingId): void
    {
        $this->dispatch('cooking-selected', cookingId: $cookingId);
    }

    public function requestCreateNew(): void
    {
        $this->dispatch('cooking-create-requested');
    }
}
