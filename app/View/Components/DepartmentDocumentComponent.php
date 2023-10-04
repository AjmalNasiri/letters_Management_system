<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DepartmentDocumentComponent extends Component
{
    public $documentDetails;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($documentDetails)
    {
        $this->documentDetails=$documentDetails;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.department-document-component')->with(['documentDetails' => $this->documentDetails]);
    }
}
