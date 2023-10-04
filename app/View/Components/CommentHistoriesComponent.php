<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CommentHistoriesComponent extends Component
{
    public $commentHistories;
    public $documentAssignedDepartmentId;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($commentHistories,$documentAssignedDepartmentId)
    {
       $this->commentHistories=$commentHistories;
       $this->documentAssignedDepartmentId=$documentAssignedDepartmentId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.comment-histories-component')->with(['commentHistories' => $this->commentHistories,'documentAssignedDepartmentId' => $this->documentAssignedDepartmentId]);
    }
}
