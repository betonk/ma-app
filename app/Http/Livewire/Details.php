<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
// use Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Details extends Component
{
    public $slug;

    use WithPagination;

    public function mount($slug)
    {
        $this->slug = $slug;
    }
    public function render()
    {
        $product = Product::where('slug', $this->slug)->first();
        return view('livewire.details', ['product' => $product])->extends('layouts.app')->section('content');
    }
    public function store($product_id, $product_name, $product_price)
    {
        if (Auth::check()) {
            Cart::add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
            session()->flash('msg', 'barang sudah masuk keranjang!');
            return redirect()->route('product.cart');
        } else {
            return redirect()->route('login');
        }
    }
}
