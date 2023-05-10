<?php

namespace App\Http\Livewire\Admin\Request;

use App\Models\Request;
use Livewire\Component;
use Livewire\WithPagination;
class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $ro = Request::orderBy('id', 'asc')->paginate(2);
        return view('livewire.admin.request.index',['request'=> $ro]);
    }
}
