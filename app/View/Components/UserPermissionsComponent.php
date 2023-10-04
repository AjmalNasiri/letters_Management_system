<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UserPermissionsComponent extends Component
{
    public $permissions;
    public $userPermissions;
    public $userId;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($userPermissions, $permissions,$userId)
    {
        $this->permissions = $permissions;
        $this->userPermissions = $userPermissions;
        $this->userId = $userId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user-permissions-component')->with(['userPermissions' => $this->userPermissions, 'permissions' => $this->permissions,'userId' => $this->userId]);
    }
}
