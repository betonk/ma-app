<?php

namespace App\Http\Livewire\Admin\Request;

use App\Models\Request;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $reqorder_id;
    public $slug, $status, $link, $name, $harga, $qty, $user_id;

    public function mount($reqorder_id)
    {
        $reqorder = Request::find($reqorder_id);

        $this->reqorder_id = $reqorder->id;
        $this->name = $reqorder->name;
        $this->slug = $reqorder->slug;
        $this->status = $reqorder->status;
        $this->link = $reqorder->link;
        $this->harga = $reqorder->harga;
        $this->qty = $reqorder->qty;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updateRequestOrder()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'status' => 'required',
            'link' => 'required',
            'harga' => 'required',
            'qty' => 'required',
        ]);

        $reqorder = Request::find($this->reqorder_id);
        $reqorder->name = $this->name;
        $reqorder->slug = $this->slug;
        $reqorder->status = $this->status;
        $reqorder->link = $this->link;
        $reqorder->harga = $this->harga;
        $reqorder->qty = $this->qty;
        
        $reqorder->save();
        session()->flash('msg', 'Data '. $reqorder->name .' sudah diupdate!');
        return redirect()->route('request.admin');
    }
}
