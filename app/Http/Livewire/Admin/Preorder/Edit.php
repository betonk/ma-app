<?php

namespace App\Http\Livewire\Admin\Preorder;

use App\Models\Preorder;
use App\Models\Request;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $po_id;
    public $status, $name, $kode, $phone, $alamat, $email, $created_at;

    public function mount($po_id)
    {
        $preorder = Preorder::find($po_id);

        $this->po_id = $preorder->id;
        $this->name = $preorder->name;
        $this->kode = $preorder->kode;
        $this->status = $preorder->status;
        $this->email = $preorder->email;
        $this->phone = $preorder->phone;
        $this->alamat = $preorder->alamat;
        $this->created_at = $preorder->created_at;
    }

    public function updatePreorder()
    {
        $preorder = Preorder::find($this->po_id);
        $preorder->status = $this->status;

        $preorder->save();
        session()->flash('msg', 'Data sudah diupdate!');
        return redirect()->route('preorder.admin');
    }
}
