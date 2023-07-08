<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Forminput extends Component
{
    /**
     * Create a new component instance.
     */
    public $name, $label,$type;
    public function __construct($name, $label, $type)
    {
        //

        $this->name = $name;
        $this->label = $label;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forminput');
    }
}
