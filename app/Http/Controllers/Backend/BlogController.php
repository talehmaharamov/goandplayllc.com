<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('backend.Blog.home', compact('blogs'));
    }

    public function create()
    {
        return view('backend.Blog.create');
    }

    public function store(Request $request)
    {
        $file = $request->file('photo');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('images/blogs', $filename);
        $data['photo'] = 'images/blogs/' . $filename;

        $blog = new Blog();
        $blog->title_en = $request->title["en"];
        $blog->title_az = $request->title["az"];
        $blog->link = $request->link;
        $blog->description_en = $request->description["en"];
        $blog->description_az = $request->description["az"];
        $blog->photo = $data['photo'];
        $blog->status = 1;
        $blog->save();
        return redirect()->route('backend.blogs.index', app()->getLocale());

    }

    public function edit($blog)
    {
        $blogs = Blog::find($blog);
        return view('backend.Blog.edit')->with(['blog' => $blogs]);
    }

    public function delBlog($blog)
    {
        $blogbyid = Blog::find($blog);
        $blogbyid->delete();
        return redirect()->back();
    }

    public function update(Request $request)
    {

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/blogs', $filename);
            $data['photo'] = 'images/blogs/' . $filename;
        }

        Blog::find($request->id)->update([
            'title_en' => $request->title["en"],
            'title_az' => $request->title["az"],
            'description_en' => $request->description["en"],
            'description_az' => $request->description["az"],
            'link' => $request->link,
            'photo' => ($request->hasFile('photo') ? $data['photo'] : Blog::find($request->id)->photo),
        ]);
        return redirect()->route('backend.blogs.index');
    }

    public function setStatus(Request $request)
    {
        $status = Blog::where('id', $request->id)->value('status');

        if ($status == 1) {
            Blog::where('id', $request->id)->update(['status' => 0]);
        } else {
            Blog::where('id', $request->id)->update(['status' => 1]);
        }
        return redirect()->route('backend.blogs.index');
    }
}
