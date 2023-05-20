<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Kategori;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $item_id;
    public $name, $slug, $anime, $kode, $desc, $regular_price, $harga_jual, $quantity, $stock_status = 'visible', $featured = 0, $file_gambar, $gambar, $kategori_id;
    public $new_image;

    public function mount($item_id)
    {
        $product = Product::find($item_id);

        $this->item_id = $product->id;
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->anime = $product->anime;
        $this->kode = $product->kode;
        $this->desc = $product->desc;
        $this->regular_price = $product->regular_price;
        $this->harga_jual = $product->harga_jual;
        $this->quantity = $product->quantity;
        $this->stock_status = $product->stock_status;
        $this->featured = $product->featured;
        $this->gambar = $product->gambar;
        $this->kategori_id = $product->kategori_id;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updateProduct()
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
            'kategori_id' => 'required',
        ]);

        $product = Product::find($this->item_id);
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
        if ($this->new_image) {
            $gambarPath = public_path('checkout/product/' . $product->gambar);

            if (file_exists($gambarPath)) {
                unlink($gambarPath);
            }

            $img = Carbon::now()->timestamp . '.' . $this->new_image->extension();
            $this->new_image->storeAs('product', $img);
            $product->gambar = $img;
        }
        $product->kategori_id = $this->kategori_id;
        $product->save();
        session()->flash('msg', 'Data ' . $product->name .' sudah diupdate!');
        return redirect()->route('home.admin');
    }

    public function render()
    {
        $ket = Kategori::orderBy('name', 'ASC')->get();
        return view('livewire.admin.product.edit', ['kategori' => $ket]);
    }
}
