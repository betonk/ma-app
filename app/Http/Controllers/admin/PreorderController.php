<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Preorder;

class PreorderController extends Controller
{
    public function edited($id)
    {
        $po = Preorder::findOrFail($id);

        return view('frontend.admin.preorder.ubah', [
            'title' => 'Edit Preorder Page',
            'preorder' => $po,
        ]);
    }
}
