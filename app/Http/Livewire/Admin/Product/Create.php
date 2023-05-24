<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Kategori;
use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
class Create extends Component
{

    public $name, $slug, $anime, $kode, $desc, $regular_price, $harga_jual, $quantity, $stock_status = 'visible', $featured = 0, $file_gambar, $gambar, $kategori_id, $deadline;
    use WithFileUploads;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function storeProduct()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'anime' => 'required',
            'kode' => 'required',
            'desc' => 'required',
            'regular_price' => 'required',
            'harga_jual' => 'required',
            'quantity' => 'required',
            'stock_status' => 'required',
            'featured' => 'required',
            'gambar' => 'required',
            'deadline' => 'required',
            'kategori_id' => 'required',
        ]);

        $product = new Product();
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->anime = $this->anime;
        $product->kode = $this->kode;
        $product->desc = $this->desc;
        $product->regular_price = $this->regular_price;
        $product->harga_jual = $this->harga_jual;
        $product->quantity = $this->quantity;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $img = Carbon::now()->timestamp . '.' . $this->gambar->extension();
        $this->gambar->storeAs('product', $img);
        $product->gambar = $img;
        $product->deadline = $this->deadline;
        $product->kategori_id = $this->kategori_id;
        $product->save();
        session()->flash('msg', 'Data barang ' . $product->name . ' sudah ditambah!');
        return redirect()->route('home.admin');
    }

    public function render()
    {
        $ket = Kategori::orderBy('name', 'ASC')->get();
        return view('livewire.admin.product.create', ['kategori' => $ket]);
    }
}
