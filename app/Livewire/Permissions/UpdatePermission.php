<?php

namespace App\Livewire\Permissions;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Permission;
use Illuminate\Validation\Rule;

#[Title('Update Permission')]
class UpdatePermission extends Component
{
    public Permission $permission;

    public $name;

    public $description;

    public $is_active = 0;

    public function mount(Permission $permission)
    {
        $this->permission = $permission;
        $this->name = $permission->name;
        $this->description = $permission->description;
        $this->is_active = $permission->is_active;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                Rule::unique('permissions')->ignore($this->permission), 
            ],
            'description' => 'required|min:5',
        ];
    }

    public function update()
    {
        $this->validate();
        $this->permission->update([
            'name' => $this->name,
            'description' => $this->description,
            'is_active' => $this->is_active,
        ]);
        return $this->redirect('/admin/permissions');
    }

    public function render()
    {
        return view('livewire.permissions.update-permission');
    }
}
