<?php 

namespace App\Livewire;

trait WithSorting
{
    public $sortBy = 'created_at';
    public $sortDirection = 'asc';
 
    public function sortByField($field)
    {
        $this->sortDirection = $this->sortBy === $field
            ? $this->reverseSort()
            : 'asc';
 
        $this->sortBy = $field;
    }
 
    public function reverseSort()
    {
        return $this->sortDirection === 'asc'
            ? 'desc'
            : 'asc';
    }
}