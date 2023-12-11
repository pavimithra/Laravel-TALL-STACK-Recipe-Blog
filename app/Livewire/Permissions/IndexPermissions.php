<?php

namespace App\Livewire\Permissions;

use Livewire\Component;
use App\Models\Permission;
use Livewire\WithPagination;
use App\Livewire\WithSearchAndLimitEntries;
use App\Livewire\WithSorting;
use Livewire\Attributes\Title;

#[Title('All Permissions')]
class IndexPermissions extends Component
{
    use WithPagination;

    use WithSearchAndLimitEntries;

    use WithSorting;

    public function delete($id)
    {
        $permission = Permission::findOrFail($id);
        $this->authorize('delete', $permission);
        $permission->delete();
    }

    public function render()
    {
        return view('livewire.permissions.index-permissions', [
            'permissions' => Permission::where('name', 'like', '%'.$this->search.'%')
                            ->orderBy($this->sortBy, $this->sortDirection)
                            ->paginate($this->no_of_rows),
        ]);
    }
}
