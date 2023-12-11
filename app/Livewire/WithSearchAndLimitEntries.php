<?php 

namespace App\Livewire;

use Livewire\Attributes\Url;

trait WithSearchAndLimitEntries
{
    #[Url]
    public $search;

    public $no_of_rows = 5;

    public function updatingSearch()
    {
        $this->resetPage();
    }
}