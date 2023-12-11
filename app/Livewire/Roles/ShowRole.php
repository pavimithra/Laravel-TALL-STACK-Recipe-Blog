<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use App\Models\Role;

class ShowRole extends Component
{
    public Role $role;

    public function mount(Role $role)
    {
        $this->role = $role;
    }

    public function render()
    {
        return view('livewire.roles.show-role');
    }
}
