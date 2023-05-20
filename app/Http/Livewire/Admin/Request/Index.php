<?php

namespace App\Http\Livewire\Admin\Request;

use App\Models\Request;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'deleteRequest' => 'destroy'
    ];

    public function destroy($id)
    {
        $req = Request::findOrFail($id);
        $req->delete();
        session()->flash('msg', 'Data ' . $req->name .  ' has been deleted!');
    }

    public function render()
    {
        $ro = Request::orderBy('id', 'asc')->paginate(5);
        return view('livewire.admin.request.index', ['request' => $ro]);
    }
}
