<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DocumentComponent extends Component
{
    public $Documents;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($Documents)
    {
        $this->Documents=$Documents;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.document-component')->with(['Documents'=>$this->Documents]);
    }
}
