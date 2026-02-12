namespace App\Livewire;

use App\Models\Recipe;
use Livewire\Component;

class RecipeManager extends Component
{
    public Recipe $recipe;
    public string $currentTab = 'details';

    public function mount(Recipe $recipe = null)
    {
        // If it's a new recipe, we create a fresh instance
        $this->recipe = $recipe ?? new Recipe();
    }

    public function setTab($tab)
    {
        $this->currentTab = $tab;
    }

    public function render()
    {
        return view('livewire.recipe-manager');
    }
}