<?php

namespace App\Http\Livewire;

use App\Models\Preorder;
use App\Models\PreorderItem;
use App\Models\Product;
use Livewire\Component;

class Transaksi extends Component
{
    public function render()
    {
        $product = Product::orderBy('gambar', 'ASC')->get();
        $po = Preorder::orderBy('status', 'ASC')->get();
        $transaksi = PreorderItem::orderBy('id', 'ASC')->paginate(5);
        return view('livewire.transaksi', ['PreorderItem' => $transaksi], ['preorder' => $po])->extends('layouts.app')->section('content');
    }
}
