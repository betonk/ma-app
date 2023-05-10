<?php

namespace App\Http\Livewire\Admin\Preorder;

use App\Models\Preorder;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $preorder = Preorder::orderBy('id', 'ASC')->paginate(5);
        return view('livewire.admin.preorder.index',['preorder'=>$preorder]);
    }
}
