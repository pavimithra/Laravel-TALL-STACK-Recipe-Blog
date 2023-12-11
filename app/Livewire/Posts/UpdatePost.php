<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Models\Category;
use App\Models\Image;

#[Title('Update Post')]
class UpdatePost extends Component
{
    use WithFileUploads;

    public Post $post;

    public $title;

    public $slug;

    public $content;

    public $images = [];

    public $categories = [];

    public $iteration = 1;

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->title = $post->title;
        $this->slug = $post->slug;
        $this->content = $post->content;
        $this->categories = $post->categories()->pluck('id');
    }

    public function rules()
    {
        return [
            'title' => [
                'required',
                Rule::unique('posts')->ignore($this->post), 
            ],
            'slug' => [
                'required',
                Rule::unique('posts')->ignore($this->post), 
            ],
            'content' => 'required|min:5',
            'categories' => 'required|array',
        ];
    }

    public function update()
    {
        $this->slug = Str::slug($this->slug);
            
        $this->validate();
        
        $this->post->update([
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
        ]);

        $this->post->categories()->sync($this->categories);
        
        return $this->redirect('/admin/posts');
    }

    public function addImages()
    {
        $validated = $this->validate([ 
            'images' => 'required',
            'images.*' => 'image',
        ]);

        $images = [];
        if($this->images){
            foreach($this->images as $image) {
                $images[]['name'] = $image->store('images/posts', 'public');
            }
        }

        $this->post->images()->createMany($images);

        $this->reset('images');

        $this->iteration++;
    }

    public function makeFeatured($imageId)
    {
        Image::where('is_featured', 1)->where('post_id', $this->post->id)
            ->update(['is_featured' => 0]);

        $image = Image::find($imageId);
 
        $image->is_featured = 1;
        
        $image->save();
    }

    public function deleteImage($id)
    {
        $image = Image::findOrFail($id);
        //$this->authorize('delete', $image);
        $image->delete();
    }

    public function render()
    {
        return view('livewire.posts.update-post', [
            'all_categories' => Category::where('parent_id', null)->pluck('name', 'id'),
       ]);
    }
}
