<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HeaderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //return 'header';
        $this->middleware('auth:header');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('header/header_home');
    }
}
