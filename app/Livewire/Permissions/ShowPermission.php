<?php

namespace App\Livewire\Permissions;

use Livewire\Component;
use App\Models\Permission;

class ShowPermission extends Component
{
    public Permission $permission;

    public function mount(Permission $permission)
    {
        $this->permission = $permission;
    }
    
    public function render()
    {
        return view('livewire.permissions.show-permission');
    }
}
