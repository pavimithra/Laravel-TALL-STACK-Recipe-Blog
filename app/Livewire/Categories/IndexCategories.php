<?php

namespace App\Livewire\Categories;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use App\Livewire\WithSearchAndLimitEntries;
use App\Livewire\WithSorting;
use Livewire\Attributes\Title;

#[Title('All Categories')]
class IndexCategories extends Component
{
    use WithPagination;

    use WithSearchAndLimitEntries;

    use WithSorting;

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $this->authorize('delete', $category);
        $category->delete();
    }

    public function render()
    {
        return view('livewire.categories.index-categories', [
            'categories' => Category::where('name', 'like', '%'.$this->search.'%')
                            ->orderBy($this->sortBy, $this->sortDirection)
                            ->paginate($this->no_of_rows),
        ]);
    }
}
