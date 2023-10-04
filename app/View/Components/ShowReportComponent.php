<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ShowReportComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $documents, public $reportType)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.show-report-component')->with(['documents' => $this->documents, 'reportType' => $this->reportType]);
    }
}
