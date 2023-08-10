<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;


class PostsPagination extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $orderColumn = "id";
    public $sortOrder = "asc";
    public $sortLink = '<i class="fa fa-caret-down" aria-hidden="true"></i>';

    public $searchTerm = "";

    public function sortOrder($columnName = "")
    {
        $caretOrder = "down";
        if ($this->sortOrder == 'asc') {
            $this->sortOrder = 'desc';
            $caretOrder = "up";
        } else {
            $this->sortOrder = 'asc';
            $caretOrder = "down";
        }
        $this->sortLink = '<i class="fa fa-caret-' . $caretOrder . '"></i>';

        $this->orderColumn = $columnName;
    }

    public function render()
    {
        $posts = Post::orderby($this->orderColumn, $this->sortOrder)->select('*');

        if (!empty($this->searchTerm)) {

            $posts->orWhere('id', 'like', "%" . $this->searchTerm . "%");
        }

        $posts = $posts->paginate(10);

        return view('livewire.posts-pagination', [
            'posts' => $posts,
        ]);
    }
}
