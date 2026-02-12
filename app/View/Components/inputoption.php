<?php

namespace App\View\Components;

use App\Http\Middleware\ApplicationSelectClauses;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class inputoption extends Component
{
    /**
     * Create a new component instance.
     */
    public string $model;
    public string $field;
    public string $prompt;
    public string $col;

   
    public function __construct(string $model, string $field, string $prompt, string $col="2")
    {
        $this->model = $model ? $model : " ";
        $this->field = $field;
        $this->prompt = $prompt;
        $this->col = $col;
        

    }

    public function getSelected(array $option){
        if($option['internal'] == $this->model){
            return " selected " ;
        }
        else 
            return "";
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.inputoption');
    }
}