<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialIcon;
class SocialIconController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $socialicicon = SocialIcon::find($id);
        if ($socialicicon) {
            if ($socialicicon->status == 0) {
                $socialicicon->status = 1;
            } else {
                $socialicicon->status = 0;
            }
            $socialicicon->save();
            Session()->flash('alert-success', 'Socialicicon Update successfully');
            return back();
        } else {
            return abort(404);
        }
    }


    public function index()
    {
        $socialIcons = SocialIcon::all();
        return view('backend.socialicon.list_socialicon',compact('socialIcons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.socialIcon.add_social_icon');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'url' => 'required',
            'icon' => 'required',
        ]);
        $socialicicon = new SocialIcon;
        $socialicicon->name = $request->name;
        $socialicicon->url = $request->url;
        $socialicicon->icon = $request->icon;
        $socialicicon->save();
        Session()->flash('alert-success','Social Icon Added Successfully');
        return redirect()->route('socialIcon.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $socialicicon = SocialIcon::findOrFail($id);
        return view('backend.socialIcon.edit_socialicon',[
            'socialicicon'=>$socialicicon
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $socialicicon = SocialIcon::findOrFail($id);
        $socialicicon->name = $request->name;
        $socialicicon->url = $request->url;
        $socialicicon->icon = $request->icon;
        $socialicicon->update();
        Session()->flash('alert-success','Social Icon Update Successfully');
        return redirect()->route('socialIcon.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SocialIcon::findOrFail($id)->delete();
        Session()->flash('alert-success','Social Icon Delete Successfully');
        return redirect()->route('socialIcon.index');
    }
}
