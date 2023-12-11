<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Title;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;

#[Title('Create Post')]
class CreatePost extends Component
{
    use WithFileUploads;

    #[Validate('required|unique:posts,title')]
    public $title;

    #[Validate('required|unique:posts,slug')]
    public $slug;

    #[Validate([
        'images' => 'required',
        'images.*' => 'image',
    ])]
    public $images = [];

    #[Validate('required|array')]
    public $categories = [];

    public function save()
    {
        $this->slug = Str::slug($this->slug);
        $this->validate();

        $post = Post::create($this->only(['title', 'slug']));

        $images = [];
        if($this->images){
            foreach($this->images as $image) {
                $images[]['name'] = $image->store('images/posts', 'public');
            }
        }

        $post->categories()->attach($this->categories);
        $post->images()->createMany($images);

        return $this->redirect('/admin/posts');
    }

    public function render()
    {
        return view('livewire.posts.create-post', [
            'all_categories' => Category::where('parent_id', null)->pluck('name', 'id'),
       ]);
    }
}
