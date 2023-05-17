<?php

namespace App\Http\Livewire\Admin\Kategori;

use App\Models\Kategori;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class Index extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name;
    public $slug;
    public $kategori_id;
    public $kd_id;
    public $updateKate = false;

    protected $rules = [
        'name' => 'required',
        'slug' => 'required'
    ];

    protected $listeners = [
        'deleteKate'=> 'destroy'
    ];

    public function store()
    {
        $this->validate();

        try {
            // 
            Kategori::create([
                'name' => $this->name,
                'slug' => $this->slug
            ]);
            // 
            session()->flash('msg', 'created!');
        } catch (\Exception $e) {
            // 
            session()->flash('msg', 'something wrong!');

            // 
            $this->resetFields();
        }
    }

    public function edit($id)
    {
        $kate = Kategori::findOrFail($id);
        $this->name = $kate->name;
        $this->slug = $kate->slug;
        $this->kd_id = $kate->id;
        $this->updateKate = true;
    }

    public function update()
    {
        // 
        $this->validate();

        try {
            Kategori::find($this->kd_id)->fill([
                'name' => $this->name,
                'slug' => $this->slug
            ])->save();
            session()->flash('msg', 'Updated!');
        } catch (\Exception $e) {
            session()->flash('msg', 'something was wrong!');
            $this->cancel();
        }
    }

    public function cancel()
    {
        $this->updateKate = false;
        $this->resetFields();
    }

    public function destroy($id)
    {
        try {
            Kategori::find($id)->delete();
            session()->flash('msg', 'deleted!');
        } catch (\Exception $e) {
            session()->flash('msg', 'something was wrong!');
            $this->resetFields();
        }
    }
    public function resetFields()
    {
        $this->name = '';
        $this->slug = '';
    }

    public function cekSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function render()
    {
        $kategori = Kategori::orderBy('id', 'ASC')->paginate(5);
        return view('livewire.admin.kategori.index', ['kategori' => $kategori]);
    }
}
