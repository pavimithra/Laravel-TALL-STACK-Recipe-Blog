<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Validation\Rule;

#[Title('Update Role')]
class UpdateRole extends Component
{
    public Role $role;

    public $name;

    public $description;

    public $is_active = 0;

    public $permissions = [];

    public function mount(Role $role)
    {
        $this->role = $role;
        $this->name = $role->name;
        $this->is_active = $role->is_active;
        $this->description = $role->description;
        $this->permissions = $role->permissions()->pluck('id');
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                Rule::unique('roles')->ignore($this->role), 
            ],
            'description' => 'required|min:5',
            'is_active' => 'boolean',
            'permissions' => 'required|array',
        ];
    }

    public function update()
    {
        $this->validate();
        $this->role->update([
            'name' => $this->name,
            'description' => $this->description,
            'is_active' => $this->is_active,
        ]);
        $this->role->permissions()->sync($this->permissions);
        return $this->redirect('/admin/roles');
    }

    public function render()
    {
        return view('livewire.roles.update-role', [
            'all_permissions' => Permission::orderBy('name', 'asc')->pluck('name', 'id'),
       ]);
    }
}
