<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function view()
    {
        return view('view');
    }

    public function create()
    {
        return view('add');
    }

    public function edit()
    {
        return view('update');
    }

    public function delete()
    {
        return view('home');
    }
}
