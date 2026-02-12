<?php

namespace App\View\Components;

use Illuminate\View\Component;

class inputselect extends Component
{
    /**
     * Create a new component instance.
     */
    public string $model;
    public string $field;
    public string $prompt;
    public string $col;
	public string $sentence;
    public function __construct(string $model, string $field, string $prompt, string $col="2")
    {
        $this->model = $model;
        $this->field = $field;
        $this->prompt = $prompt;
        $this->col = $col;
		$this->sentence = session('applicationselectclauses')[$field];
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    
      public function render()
    {
        return view('components.inputselect');
        
    }
}