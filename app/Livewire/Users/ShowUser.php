<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\User;

class ShowUser extends Component
{
    public User $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.users.show-user');
    }
}
