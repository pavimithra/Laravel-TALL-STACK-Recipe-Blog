<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use App\Models\Role;
use Livewire\WithPagination;
use App\Livewire\WithSearchAndLimitEntries;
use App\Livewire\WithSorting;
use Livewire\Attributes\Title;

#[Title('All Roles')]
class IndexRoles extends Component
{
    use WithPagination;

    use WithSearchAndLimitEntries;

    use WithSorting;

    public function delete($id)
    {
        $role = Role::findOrFail($id);
        $this->authorize('delete', $role);
        $role->delete();
    }

    public function render()
    {
        return view('livewire.roles.index-roles', [
            'roles' => Role::where('name', 'like', '%'.$this->search.'%')
                            ->orderBy($this->sortBy, $this->sortDirection)
                            ->paginate($this->no_of_rows),
        ]);
    }
}
