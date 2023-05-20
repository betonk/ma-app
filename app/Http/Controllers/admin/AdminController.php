<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Preorder;
use PDF;

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
    public function generate_pdf()
    {
        $preorder = Preorder::orderBy('id', 'ASC')->get();
        $date = date('d-m-Y');
        view()->share('preorder', $preorder);
        $pdf = PDF::loadView('frontend.admin.preorder.generate-pdf', ['preorder' => $preorder, 'date' => $date]);
        return $pdf->download('Preorder_' . $date . '.pdf');
    }

    public function request_view()
    {
        return view('frontend.admin.request.index', ['title' => 'Request Order Page']);
    }
}
