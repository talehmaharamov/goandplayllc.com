<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\PageElements;
use App\Models\Pages;
use App\Models\TeamElements;
use App\Models\TeamsDetails;
use App\Models\TeamUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        $pages = Pages::where('status',1)->get();
        $blogs = Blog::where('status', 1)->get();
        return view('frontend.home', get_defined_vars());
    }

    public function teamsForm(){
        $pageElements = TeamElements::all();
        $teamsDetails = TeamsDetails::find(1);
        $teamUsers = TeamUsers::all();
        return view('frontend.teams',get_defined_vars());
    }

    public function toPage($slug){
        $idPage = Pages::where('slug',$slug)->first();
        $pageElements = PageElements::where('page_id',$idPage->id)->get();
        return view('frontend.pages',get_defined_vars());
    }

    public function contactForm(){
        return view('frontend.contact');
    }

    public function addContact(Request $request){
        $newContact = new Contact;
        $newContact->name = $request->name;
        $newContact->phone = $request->phone;
        $newContact->email = $request->email;
        $newContact->message = $request->message;
        $newContact->save();
        return redirect()->route('frontend.index');
    }

}
