<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function __construct()
    {
        // $this->middleware('auth');
    }
    public function index()
    {
        return view('frontend.member.index', ['title' => 'Member Home Page']);
    }
}
