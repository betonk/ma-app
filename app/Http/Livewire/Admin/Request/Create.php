<?php

namespace App\Http\Livewire\Admin\Request;

use App\Models\Request;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Create extends Component
{
    public $slug, $status, $link, $name, $harga, $qty, $user_id;
    use WithFileUploads;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function storeRequest()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'status' => 'required',
            'link' => 'required',
            'harga' => 'required',
            'qty' => 'required',
        ]);

        $req = new Request();
        $req->user_id = auth()->id();
        $req->name = $this->name;
        $req->slug = $this->slug;
        $req->status = $this->status;
        $req->link = $this->link;
        $req->harga = $this->harga;
        $req->qty = $this->qty;
        $req->save();
        session()->flash('msg', 'Data ' . $req->name .  ' sudah ditambah!');
        return redirect()->route('request.admin');
    }

    public function render()
    {
        return view('livewire.admin.request.create');
    }
}
