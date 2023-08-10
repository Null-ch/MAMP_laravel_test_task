<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class CategoriesPagination extends Component
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
        $categories = Category::orderby($this->orderColumn, $this->sortOrder)->select('*');

        if (!empty($this->searchTerm)) {

            $categories->orWhere('id', 'like', "%" . $this->searchTerm . "%");
        }

        $categories = $categories->paginate(10);

        return view('livewire.categories-pagination', [
            'categories' => $categories,
        ]);
    }
}
