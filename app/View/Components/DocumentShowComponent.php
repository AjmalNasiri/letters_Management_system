<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DocumentShowComponent extends Component
{
    public $document;
     public $documentArchiveStatus;
     public $documentStatus;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($document,$documentArchiveStatus,$documentStatus)
    {
        $this->document=$document;
        $this->documentArchiveStatus=$documentArchiveStatus;
        $this->documentStatus=$documentStatus;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.document-show-component')->with(['document' => $this->document,'documentArchiveStatus'=> $this->documentArchiveStatus,'documentStatus' => $this->documentStatus]);
    }
}
