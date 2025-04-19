<?php

namespace App\Livewire\Categories;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\WithFileUploads;
use App\Models\Category;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

#[Title('Update Category')]
class UpdateCategory extends Component
{
    use WithFileUploads;

    public Category $category;

    public $name;

    public $slug;

    public $description;

    public $image;

    public $is_active;

    public $parent_id;

    public function mount(Category $category)
    {
        $this->category = $category;
        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->is_active = $category->is_active;
        $this->description = $category->description;
        $this->parent_id = $category->parent_id;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                Rule::unique('categories')->ignore($this->category), 
            ],
            'slug' => [
                'required',
                Rule::unique('categories')->ignore($this->category), 
            ],
            'description' => 'required|min:5',
            'is_active' => 'boolean',
            'image' => 'nullable|image',
            'parent_id' => 'nullable',
        ];
    }

    public function update()
    {
        $this->slug = Str::slug($this->slug);

        if(!$this->parent_id)
            $this->parent_id = null;
            
        $this->validate();

        if($this->image){
            if($this->image) {
                Storage::disk('public')->delete($this->category->image);
            }
            $this->image = $this->image->store('images/category', 'public');
        } else {
            $this->image = $this->category->image;
        }

        $this->category->update([
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'image' => $this->image,
            'is_active' => $this->is_active,
            'parent_id' => $this->parent_id,
        ]);
        
        return $this->redirect('/admin/categories');
    }

    public function render()
    {
        return view('livewire.categories.update-category', [
            'categories' => Category::where('parent_id', null)->pluck('name', 'id'),
       ]);
    }
}
