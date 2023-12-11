<?php

namespace App\Livewire\Categories;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Category;
use Livewire\Attributes\Title;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

#[Title('Create Category')]
class CreateCategory extends Component
{
    use WithFileUploads;

    #[Validate('required|unique:categories,name')]
    public $name;

    #[Validate('required|unique:categories,slug')]
    public $slug;

    #[Validate('required|min:5')]
    public $description;

    #[Validate('required|image')]
    public $image;

    public function save()
    {
        $this->slug = Str::slug($this->slug);
        $this->validate();
        $this->image = $this->image->store('images/category', 'public');
        Category::create($this->only(['name', 'slug', 'description', 'image']));
        return $this->redirect('/admin/categories');
    }

    public function render()
    {
        return view('livewire.categories.create-category');
    }
}
