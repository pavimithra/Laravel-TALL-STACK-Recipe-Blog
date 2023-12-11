<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use App\Livewire\WithSearchAndLimitEntries;
use App\Livewire\WithSorting;
use App\Models\Post;

#[Title('All Posts')]
class IndexPosts extends Component
{
    use WithPagination;

    use WithSearchAndLimitEntries;

    use WithSorting;

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $this->authorize('delete', $post);
        $post->delete();
    }

    public function render()
    {
        return view('livewire.posts.index-posts', [
            'posts' => Post::where('title', 'like', '%'.$this->search.'%')
                            ->orderBy($this->sortBy, $this->sortDirection)
                            ->paginate($this->no_of_rows),
        ]);
    }
}
