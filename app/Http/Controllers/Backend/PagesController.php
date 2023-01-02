<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PageElements;
use App\Models\Pages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PagesController extends Controller
{
    public function index()
    {
        $pages = Pages::all();
        return view('backend.Pages.index', compact('pages'));
    }

    public function pageStatus(Request $request)
    {
        $status = Pages::where('id', $request->id)->value('status');
        if ($status == 1) {
            Pages::where('id', $request->id)->update(['status' => 0]);
        } else {
            Pages::where('id', $request->id)->update(['status' => 1]);
        }
        return redirect()->route('backend.pages.index');
    }

    public function elementStatus(Request $request)
    {
        $status = PageElements::where('id', $request->id)->value('status');
        if ($status == 1) {
            PageElements::where('id', $request->id)->update(['status' => 0]);
        } else {
            PageElements::where('id', $request->id)->update(['status' => 1]);
        }
        return redirect()->back();
    }

    public function create()
    {
        return view('backend.Pages.create');
    }

    public function store(Request $request)
    {
        $file = $request->file('photo');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('images/pages', $filename);
        $data['photo'] = 'images/pages/' . $filename;
        $page = new Pages;
        $page->name_en = $request->name["en"];
        $page->name_az = $request->name["az"];
        $page->slug = $request->slug;
        $page->photo = $data["photo"];
        $page->status = 1;
        $page->save();
        return redirect()->route('backend.pages.index');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $pages = Pages::find($id);
        return view('backend.Pages.edit')->with(['page' => $pages]);
    }

    public function update(Request $request)
    {
        try {
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('images/pages', $filename);
                $data['photo'] = 'images/pages/' . $filename;
            }

            Pages::find($request->id)->update([
                'name_en' => $request->name["en"],
                'name_az' => $request->name["az"],
                'slug' => Str::lower($request->slug),
                'photo' => ($request->hasFile('photo') ? $data['photo'] : Pages::find($request->id)->photo),
            ]);
            return redirect()->route('backend.pages.index')->with('message',__('messages.success'));
        }
        catch (\Exception $e){
            return redirect()->route('backend.pages.index')->with('message',__('messages.success'));
        }

    }

    public function elementForm($id)
    {
        $elements = PageElements::where('page_id', $id)->get();
        $currentPage = Pages::find($id);
        return view('backend.Pages.elements.index', get_defined_vars());
    }

    public function createElementForm($id)
    {
        $currentPage = Pages::find($id);
        return view('backend.Pages.elements.create', get_defined_vars());
    }

    public function createElement(Request $request)
    {

        $file = $request->file('photo');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('images/pages/elements', $filename);
        $data['photo'] = 'images/pages/elements/' . $filename;
        $element = new PageElements;
        $element->title_en = $request->title["en"];
        $element->title_az = $request->title["az"];
        $element->page_id = $request->id;
        $element->description_en = $request->description["en"];
        $element->description_az = $request->description["az"];
        $element->photo = $data["photo"];
        $element->status = 1;
        $element->save();
        return redirect()->back();
    }

    public function updateElement(Request $request, $id)
    {
        $element = PageElements::find($id);
        try {
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('images/pages/elements', $filename);
                $data['photo'] = 'images/pages/elements' . $filename;
            }

            PageElements::find($request->id)->update([
                'title_en' => $request->title["en"],
                'title_az' => $request->title["az"],
                'description_en' => $request->description["en"],
                'description_az' => $request->description["az"],
                'photo' => ($request->hasFile('photo') ? $data['photo'] : PageElements::find($request->id)->photo),
            ]);
            return redirect()->back()->with('message',__('messages.success'));
        } catch (\Exception $e) {
            return redirect()->back()->with('message',__('messages.error'));
        }
    }

    public function delPage($id)
    {
        $page = Pages::find($id)->first();
        DB::table('page_elements')->where('page_id', $id)->delete();
        $page->delete();
        return redirect()->back();
    }

    public function editElement($id)
    {
        $element = PageElements::find($id);
        return view('backend.Pages.elements.edit', get_defined_vars());
    }
}
