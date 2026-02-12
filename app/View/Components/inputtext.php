<?php

namespace App\View\Components;



use Illuminate\View\Component;

class inputtext extends Component
{
    /**
     * Create a new component instance.
     */
    public ?string $model;
    public string $field;
    public string $prompt;
    public string $col;
    public function __construct(?string $model= null, string $field, string $prompt, string $col="2")
    {
        $this->model = $model;
        $this->field = $field;
        $this->prompt = $prompt;
        $this->col = $col;


    }

    /**
     * Get the view / contents that represent the component.
     */
    public function computeValue(){
        $quot = '""';
        $quotsimple = "'";
        $dolard="$";
        $arrow="->";
        // $part2 = $dolard . $this->model . "->" .$this->field. ", " . $quotsimple .' '. $quotsimple.")";
        // $result = "value=old('$this->field',".$part2;
        // // echo $result;
        
        $result = $this->model . $arrow . $this->field  ;
        
        return $result;
    }
    
      public function render()
    {
        return view('components.inputtext');
        
    }
}