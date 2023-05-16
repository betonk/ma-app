<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

class RequestController extends Controller
{
    //
    public function add()
    {
        return view('frontend.admin.request.add', ['title' => 'Add Product Page']);
    }
}
