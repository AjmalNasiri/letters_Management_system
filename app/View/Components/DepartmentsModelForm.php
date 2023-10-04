<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DepartmentsModelForm extends Component
{
    public $departments;
    public $documentId;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($departments,$documentId)
    {
       $this->departments=$departments;
       $this->documentId=$documentId;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.departments-model-form')->with(['departments' => $this->departments,'documentId' => $this->documentId]);
    }
}
