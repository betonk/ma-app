<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $products = Product::orderBy('id', 'ASC')->where('name', 'like', '%' . $this->search . '%')->paginate('8');
        return view('livewire.index', ['product' => $products]);
    }
    public function store($product_id, $product_name, $product_harga)
    {
        if(Auth::check()){
            Cart::add($product_id,$product_name,1,$product_harga)->associate('App\Models\Product');
            session()->flash('msg', 'suskses cart!');
            return redirect()->route('product.cart');
        }
    }
}
