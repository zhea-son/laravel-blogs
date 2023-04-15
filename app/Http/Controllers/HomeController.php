<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if(auth()->user()->role == 1){
            $blogs = Blog::all();
        }
        else{
            $blogs = Auth::user()->blogs;
        }
        return view('home', compact('blogs'));
    }

    public function view()
    {
        return view('view');
    }

    public function create()
    {
        $blog_categories = BlogCategory::all();
        return view('add', compact('blog_categories'));
    }

    public function add(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'blog_category_id' => 'required',           
            'description' => 'required',
        ]);

        foreach ($formFields as &$value) {
            $value = strip_tags($value);
        }

        if($request->hasFile('image')){
            $formFields['image'] = $request->file('image')->store('images','public');
        }

        $formFields['user_id'] = auth()->id();
        // $formFields['blog_category_id'] = $formFields['category_id'];

        Blog::create($formFields);

        return redirect('/home')->with('message', "Listing created successfully!");
    }

    public function edit($id)
    {
        $blog = Blog::findOrfail($id);
        $blog_categories = BlogCategory::all();

        return view('edit', ['blog' => $blog], compact('blog_categories') );
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

    public function destroy($id){
        $blog = Blog::findOrFail($id);
        if($blog->user_id != auth()->id()){
            abort(403,'Unauthorized Action');
        }
        $blog->delete();
        return back()->with('message', 'Listing deleted successfully!');
    }
}
