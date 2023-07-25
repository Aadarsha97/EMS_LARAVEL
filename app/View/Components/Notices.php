<?php

namespace App\View\Components;

use App\Models\Notice;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Notices extends Component
{
    /**
     * Create a new component instance.
     */

    public $notices;
    public function __construct()
    {
        //

        $this->notices = Notice::orderBy('date', 'desc')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.notices');
    }
}
