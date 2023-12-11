<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Role;
use App\Models\Permission;
use Livewire\Attributes\Title;

#[Title('Create Role')]
class CreateRole extends Component
{
    #[Validate('required|unique:roles,name')]
    public $name = '';

    #[Validate('required|min:5')]
    public $description = '';

    #[Validate('required|array')]
    public $permissions = [];

    public function save()
    {
        $this->validate();
        $role = Role::create($this->only(['name', 'description']));
        $role->permissions()->attach($this->permissions);
        return $this->redirect('/admin/roles');
    }

    public function render()
    {
        return view('livewire.roles.create-role', [
            'all_permissions' => Permission::orderBy('name', 'asc')->pluck('name', 'id'),
       ]);
    }
}
