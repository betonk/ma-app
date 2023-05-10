<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    //
    public function __construct()
    {
        // $this->middleware('auth');
    }
    public function index()
    {
        return view('frontend.staff.index', ['title' => 'Staff Home Page']);
    }
}
