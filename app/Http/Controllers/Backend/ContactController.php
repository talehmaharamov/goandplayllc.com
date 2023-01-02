<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $contacts = Contact::all();
        return view('backend.Contact.index',get_defined_vars());
    }

    public function delContact($id){
        $contactByid = Contact::find($id);
        $contactByid->delete();
        return redirect()->back();
    }


}
