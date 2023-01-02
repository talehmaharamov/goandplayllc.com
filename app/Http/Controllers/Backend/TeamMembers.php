<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TeamUsers;
use Illuminate\Http\Request;

class TeamMembers extends Controller
{
    public function index(){
        $members = TeamUsers::all();
        return view('backend.Teams.team-member',get_defined_vars());
    }

    public function delMember($id){
        try {
            $member = TeamUsers::find($id);
            $member->delete();
            return redirect()->back()->with('message',__('messages.delete-success'));
        }
        catch (\Exception $e){
            return redirect()->back()->with('message',__('messages.error'));
        }
    }

    public function store(Request $request){

//        dd($request->all());
        try {
            $member = new TeamUsers;
            $member->name_en = $request->name["en"];
            $member->name_az = $request->name["az"];
            $member->save();
            return redirect()->back()->with('message',__('messages.success'));
        }
        catch (\Exception $e){
            return redirect()->back()->with('message',__('messages.error'));
        }
    }
    public function create(){
        return view('backend.Teams.create-team-member');
    }
}
