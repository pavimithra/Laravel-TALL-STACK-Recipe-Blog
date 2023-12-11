<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use App\Livewire\WithSearchAndLimitEntries;
use App\Livewire\WithSorting;
use Livewire\Attributes\Title;

#[Title('All Users')]
class IndexUsers extends Component
{
    use WithPagination;

    use WithSearchAndLimitEntries;

    use WithSorting;
    
    public function render()
    {
        return view('livewire.users.index-users', [
            'users' => User::where('name', 'like', '%'.$this->search.'%')
                            ->orderBy($this->sortBy, $this->sortDirection)
                            ->paginate($this->no_of_rows),
        ]);
    }
}
