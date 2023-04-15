<?php

namespace App\Http\Controllers;

use App\Models\Blog;
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
        $blogs = Blog::latest()->Simplepaginate(8);
        return view('home', compact('blogs'));
    }

    public function view()
    {
        return view('view');
    }

    public function create()
    {
        return view('add');
    }

    public function add(Request $request)
    {

        $formFields = $request->validate([
            'title' => 'required',
            'category' => 'required',
            
            'description' => 'required',
        ]);

        foreach ($formFields as &$value) {
            $value = strip_tags($value);
        }

        if($request->hasFile('image')){
            $formFields['image'] = $request->file('image')->store('images','public');
        }

        $formFields['user_id'] = auth()->id();
        $formFields['author'] = auth()->user()->name;

        Blog::create($formFields);

        return redirect('/home')->with('message', "Listing created successfully!");
    }

    public function edit($id)
    {
        $blog = Blog::findOrfail($id);
        return view('edit', ['blog' => $blog] );
    }

    public function update($id, Request $request)
    {
        $blog = Blog::findOrfail($id);

        if($blog->user_id != auth()->id()){
            abort(403,'Unauthorized Action');
        }
        $formFields = $request->validate([
            'title' => 'required',
            'category' => 'required',
            
            'description' => 'required',
        ]);

        foreach ($formFields as &$value) {
            $value = strip_tags($value);
        }
        if($request->hasFile('image')){
            $formFields['image'] = $request->file('image')->store('images','public');
        }
        $blog->update($formFields);

        return redirect('/home')->with('message', "Listing updated successfully!");
    }
}
