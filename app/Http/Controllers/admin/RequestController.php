<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Request;

class RequestController extends Controller
{
    //
    public function add()
    {
        return view('frontend.admin.request.add', ['title' => 'Add Request Order Page']);
    }

    public function edited($id)
    {
        $reqorder = Request::findOrFail($id);

        return view('frontend.admin.request.ubah', [
            'title' => 'Edit Request Order Page',
            'request' => $reqorder,
        ]);
    }
}
