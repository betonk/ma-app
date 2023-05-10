<?php

namespace App\Http\Livewire;

use App\Models\Preorder;
use App\Models\PreorderItem;
use App\Models\Product;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Livewire\Component;

class Keranjang extends Component
{
    public $name, $email, $phone, $alamat, $gambar;

    use WithFileUploads;

    public function increaseQuantity($rowId)
    {
        if (Auth::check()) {
            $product = Cart::get($rowId);
            $qty = $product->qty + 1;
            Cart::update($rowId, $qty);
        }
    }
    public function decreaseQuantity($rowId)
    {
        if (Auth::check()) {
            $product = Cart::get($rowId);
            $qty = $product->qty - 1;
            Cart::update($rowId, $qty);
        }
    }

    public function destroy($rowId)
    {
        Cart::remove($rowId);
        session()->flash('msg', 'item has been removed!');
    }
    public function clearAll()
    {
        Cart::destroy();
        session()->flash('msg', 'All Item are removed');
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required',
            'alamat' => 'required|string',
            'gambar' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ];
    }

    public function order()
    {
        $this->validate();
        
        $gambar = Carbon::now()->timestamp . '.' . $this->gambar->extension();
        $this->gambar->storeAs('product', $gambar);
        $po = Preorder::create([
            'user_id' => auth()->user()->id,
            'kode' => 'PO-' . Str::random(4),
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'gambar' => $gambar,
            'alamat' => $this->alamat,
            'status' => '1',
        ]);
        $cart_content = Cart::content(1);
        foreach ($cart_content as $cart) {
            $poi = new PreorderItem();

            $data = Product::find($cart->id);

            $poi->preorder_id = $po->id;
            $poi->product_id = $cart->id;
            $poi->quantity = $cart->qty;
            $poi->price = $cart->price;
            $poi->save();
        }
        Cart::destroy();
        session()->flash('msg', 'item has been checkout');
        return $po;
    }

    public function render()
    {
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
        $this->phone = auth()->user()->phone;
        $this->alamat = auth()->user()->alamat;
        $this->gambar = $this->gambar;
        return view('livewire.keranjang')->extends('layouts.app')->section('content');
    }
}
