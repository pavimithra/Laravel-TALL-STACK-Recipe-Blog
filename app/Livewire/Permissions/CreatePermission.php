<?php

namespace App\Livewire\Permissions;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Permission;
use Livewire\Attributes\Title;

#[Title('Create Permission')]
class CreatePermission extends Component
{
    #[Validate('required|unique:permissions,name')]
    public $name = '';

    #[Validate('required|min:5')]
    public $description = '';

    public function save()
    {
        $this->validate();
        Permission::create($this->only(['name', 'description']));
        return $this->redirect('/admin/permissions');
    }

    public function render()
    {
        return view('livewire.permissions.create-permission');
    }
}
