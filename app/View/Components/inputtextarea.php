<?php

namespace App\View\Components;

use Closure;

use Illuminate\View\Component;

class inputtextarea extends Component
{
    /**
     * Create a new component instance.
     */
    public string $model;
    public string $field;
    public string $prompt;
    public string $col;
    public function __construct(string $model=" ", string $field, string $prompt, string $col="2")
    {
        $this->model = $model;
        $this->field = $field;
        $this->prompt = $prompt;
        $this->col = $col;


    }

    /**
     * Get the view / contents that represent the component.
     */

    
      public function render()
    {
        return view('components.inputtext');
        
    }
}