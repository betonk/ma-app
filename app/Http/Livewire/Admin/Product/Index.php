<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Kategori;
use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use League\CommonMark\Util\Xml;
use Livewire\WithFileUploads;

class Index extends Component
{
    public $name, $slug, $anime, $kode, $desc, $regular_price, $quantity, $stock_status = "visible", $featured = "0", $gambar, $kategori_id;

    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';

    public function geneSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    protected $listeners = [
        'deleteProduct' => 'destroy'
    ];

    public function addProduct()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'anime' => 'required',
            'kode' => 'required',
            'desc' => 'required',
            'regular_price' => 'required',
            'quantity' => 'required',
            'stock_status' => 'required',
            'featured' => 'required',
            'gambar' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'kategori_id' => 'required',
        ]);

        $product = new Product();
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->anime = $this->anime;
        $product->kode = $this->kode;
        $product->desc = $this->desc;
        $product->regular_price = $this->regular_price;
        $product->quantity = $this->quantity;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $img = Carbon::now()->timestamp . '.' . $this->gambar->extension();
        $this->gambar->saveAs('products', $img);
        $product->gambar = $img;
        $product->kategori_id = $this->kategori_id;
        $product->save();
        session()->flash('msg', 'berhasil menambah data!');
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if ($product) {
            unlink(('checkout/product/') . $product->gambar);
            $product->delete();
            session()->flash('msg', 'Item ' . $product->name . '  sudah terhapus!');
        }
    }

    public function render()
    {
        $kategori = Kategori::orderBy('name', 'ASC')->get();
        $product = Product::orderBy('id', 'ASC')->paginate(5);
        return view('livewire.admin.product.index', ['product' => $product], ['kategori' => $kategori]);
    }
}
