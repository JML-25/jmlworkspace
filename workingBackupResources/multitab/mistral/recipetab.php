// app/Livewire/RecipeTab.php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Recipe;

class RecipeTab extends Component
{
    public Recipe $recipe;
    public $name;
    public $description;

    public function mount(Recipe $recipe)
    {
        $this->name = $recipe->name;
        $this->description = $recipe->description;
    }

    public function save()
    {
        $this->recipe->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);
        $this->dispatch('recipe-updated');
    }

    public function render()
    {
        return view('livewire.recipe-tab');
    }
}
