<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\PageElements;
use App\Models\Pages;
use Illuminate\Http\Request;

class HomeController extends Controller
{
public function index(){

    $countPage = Pages::where('status',1)->get()->count();
    $countElement = PageElements::where('status',1)->get()->count();
    $countBlog = Blog::where('status',1)->get()->count();
    $countContact = Contact::all()->count();
    return view('backend.home',get_defined_vars());
}
}
