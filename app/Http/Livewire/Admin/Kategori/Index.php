<?php

namespace App\Http\Livewire\Admin\Kategori;

use App\Models\Kategori;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $kategori = Kategori::orderBy('id', 'ASC')->paginate(5);
        return view('livewire.admin.kategori.index',['kategori'=>$kategori])
        // ->extends('layouts.app')->section('content')
        ;
    }
}
