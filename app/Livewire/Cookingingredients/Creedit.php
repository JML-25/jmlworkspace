<?php

namespace App\Livewire\Cookingingredients;

use App\Models\Cooking;
use App\Models\Cookingingredient;
use App\Models\Ingredient;
use Livewire\Component;
use Livewire\Attributes\On;

class Creedit extends Component
{
    public $ingredient_title;
    public $ingredient_id;
	public $cooking_id;
	public array $cookingingredient;
	public Cooking $cooking;
	public bool $isEdit;
	
    

   public function mount(Array $cookingingredient)
    {
		$this->cooking_id = $cookingingredient['cooking_id'];
        if ($cookingingredient['ingredient_id']) {
            $this->ingredient_id = $cookingingredient['ingredient_id'];
			$theingredient = Ingredient::findOrFail($cookingingredient['ingredient_id']);
			$this->ingredient_title = $theingredient->title;
			
        }
    }

    #[On('ingredient-selected')]
    public function setIngredient(Ingredient $ingredient)
    {
        $this->ingredient_id = $ingredient->id;
        $this->ingredient_title = $ingredient->title;
		// $this->ingredient_id = 0;
        // $this->ingredient_title = "the title";
    }


    public function render()
    {
        return view('livewire.cookingingredients.creedit');
    }
}