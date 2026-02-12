<?php

namespace App\Livewire\Cookings;

use App\Models\Ingredient;
use Livewire\Component;
use Livewire\Attributes\On;

class Cookingsearch extends Component
{
    public $query = '';
    public $results = [];
    public $showDropdown = false;
	public $open = false;
    public $counter =0;
    public $message = "...";
	
	

    public $selectedTitle = "****";
    public $selectedId = -1;

    public function updatedQuery($value)
    {
        
        $this->counter = $this->counter + 1;
        $this->message = "in the query counter = ".$this->counter;
        
        if (strlen($this->query) < 2) {
            $this->results = [];
            $this->showDropdown = false;
            return;
        }

        $this->results = Ingredient::query()
            ->where('title', 'like', "%{$this->query}%")
            ->orWhere('description', 'like', "%{$this->query}%")
            ->limit(8)
            ->get();

        $this->showDropdown = true;
    }
	
#[On('opencookingsearch')]
	public function setVisible(){
		$this->open = !$this->open;
        
	}

    public function selectIngredient($id)
    {
        $ingredient = Ingredient::find($id);

        $this->dispatch('ingredient-selected', ingredient: $ingredient);

        $this->query = $ingredient->title;
        $this->showDropdown = false;
		$this->open = false;
        $this->selectedTitle = $ingredient->title;
        $this->selectedId = $ingredient->id;
    }

   
    
    public function render()
    {
        return view('livewire.cookings.cookingsearch')->layout('components.layout');
    }
}