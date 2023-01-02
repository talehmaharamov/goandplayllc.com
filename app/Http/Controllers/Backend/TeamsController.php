<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TeamElements;
use App\Models\TeamsDetails;
use App\Models\TeamUsers;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    public function index()
    {
        $teamElements = TeamElements::all();
        $teamUsers = TeamUsers::all();
        $teamsDetails = TeamsDetails::find(1);
        return view('backend.Teams.index', get_defined_vars());
    }

    public function create()
    {
        return view('backend.Teams.create');
    }

    public function teamStatus(Request $request)
    {
        $status = TeamElements::where('id', $request->id)->value('status');
        if ($status == 1) {
            TeamElements::where('id', $request->id)->update(['status' => 0]);
        } else {
            TeamElements::where('id', $request->id)->update(['status' => 1]);
        }
        return redirect()->route('backend.teams.index');
    }

    public function delTeamElement($id)
    {
        try {
            $teamElement = TeamElements::find($id);
            $teamElement->delete();
            return redirect()->back()->with('message', __('messages.delete-success'));
        } catch (\Exception $e) {
            return redirect()->back()->with('message', __('messages.error'));
        }
    }

    public function edit($id)
    {
        $teamElement = TeamElements::find($id);
        return view('backend.Teams.edit', get_defined_vars());
    }

    public function update(Request $request, $id)
    {
        try {
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('images/pages/teams', $filename);
                $data['photo'] = 'images/pages/teams/' . $filename;
            }

            TeamElements::find($request->id)->update([
                'title_en' => $request->title["en"],
                'title_az' => $request->title["az"],
                'description_en' => $request->description["en"],
                'description_az' => $request->description["az"],
                'photo' => ($request->hasFile('photo') ? $data['photo'] : TeamElements::find($request->id)->photo),
            ]);
            return redirect()->route('backend.teams.index')->with('message', __('messages.success'));
        } catch (\Exception $e) {
            return redirect()->route('backend.teams.index')->with('message', __('messages.success'));
        }
    }

    public function store(Request $request)
    {
        try {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/pages/teams/elements', $filename);
            $data['photo'] = 'images/pages/teams/elements/' . $filename;

            $teamElement = new TeamElements;
            $teamElement->title_en = $request->title["en"];
            $teamElement->title_az = $request->title["az"];
            $teamElement->description_en = $request->description["en"];
            $teamElement->description_az = $request->description["az"];
            $teamElement->photo = $data["photo"];
            $teamElement->status = 1;
            $teamElement->save();

            return redirect()->back()->with('message', __('messages.success'));
        } catch (\Exception $e) {
            return redirect()->back()->with('message', __('messages.error'));
        }
    }

    public function teamsDetails(Request $request)
    {
        try {
            TeamsDetails::find(1)->update([
                'title_en' => $request->title_en,
                'title_az' => $request->title_az,
                'description_en' => $request->description_en,
                'description_az' => $request->description_az,
            ]);
            return redirect()->back()->with('detailsMessage', __('messages.success'));
        } catch (\Exception $e) {
            return redirect()->back()->with('detailsMessage', __('messages.error'));
        }
    }
}
