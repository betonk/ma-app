<?php

namespace App\Http\Livewire\Admin\Preorder;

use App\Models\Preorder;
use App\Models\PreorderItem;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'deletePreorder' => 'destroy'
    ];
    public function destroy($id)
    {
        $po = Preorder::findOrFail($id);
        PreorderItem::where('preorder_id', $id)->delete();

        $po->delete();
        session()->flash('msg', 'Data ' . $po->kode . ' has been deleted!');
    }


    public function render()
    {
        $preorder = Preorder::orderBy('id', 'ASC')->paginate(5);
        return view('livewire.admin.preorder.index', ['preorder' => $preorder]);
    }
}
