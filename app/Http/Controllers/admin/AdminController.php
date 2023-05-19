<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        // $this->middleware('auth');
    }
    public function index()
    {
        return view('frontend.admin.product.index', ['title' => 'Admin Home Page']);
    }
    public function member_view()
    {
        return view('frontend.admin.member.index', ['title' => 'Member Page']);
    }
    public function kategori_view()
    {
        return view('frontend.admin.kategori.index', ['title' => 'Kategori Page']);
    }
    public function po_view()
    {
        return view('frontend.admin.preorder.index', ['title' => 'Pre Order Page']);
    }
    public function request_view()
    {
        return view('frontend.admin.request.index', ['title' => 'Request Order Page']);
    }
}
