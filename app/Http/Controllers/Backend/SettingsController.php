<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Settings::all();
        return view('backend.Settings.index', get_defined_vars());
    }

    public function create()
    {
        return view('backend.Settings.create');
    }

    public function store(Request $request)
    {
        try {
            $setting = new Settings;
            $setting->name = $request->name;
            $setting->guard = $request->guard;
            $setting->status = 1;
            $setting->save();
            return redirect()->back()->with('message', __('messages.success'));
        } catch (\Exception $e) {

            return redirect()->back()->with('errorMessage', __('messages.error'));
        }
    }

    public function edit($setting){
        $settings = Settings::find($setting);
        return view('backend.Settings.edit',get_defined_vars());
    }

    public function update(Request $request,$id){


        try {
            $setting = Settings::find($id);
            $setting->update([
                'name' => $request->name,
                'guard' => $request->guard,
            ]);
            return redirect()->route('backend.settings.index')->with('message',__('messages.success'));
        }
        catch (\Exception $e){
            return redirect()->route('backend.settings.index')->with('message',__('errorMessages.success'));
        }
    }

    public function delSetting($id)
    {
        try {
            $setting = Settings::find($id);
            $setting->delete();
            return redirect()->back()->with('message', __('messages.success'));
        } catch (\Exception $e) {
            return redirect()->back()->with('errorMessage', __('messages.error'));
        }
    }

    public function settingStatus($id)
    {
        $status = Settings::where('id',$id)->value('status');
        if ($status == 1) {
            Settings::where('id', $id)->update(['status' => 0]);
        } else {
            Settings::where('id', $id)->update(['status' => 1]);
        }
        return redirect()->route('backend.settings.index');
    }
}
