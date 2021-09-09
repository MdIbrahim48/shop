<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\File;
use Image;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $settings = Setting::first();
        // return view('backend.setting.list_setting',[
        //     'settings' => $settings
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $findData = Setting::first();
        return view('backend.setting.add_setting',[
            'findData' => $findData, 
        ]);
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
            'description' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'fax' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'skype' => 'required',
            'copyright' => 'required',
        ]);
        $findData = Setting::first();
        if($findData){
            $setting = $findData ;
        }else{
           $setting = new Setting;
        }
        $setting->description = $request->description;
        $setting->address = $request->address;
        $setting->phone = $request->phone;
        $setting->fax = $request->fax;
        $setting->email = $request->email;
        $setting->mobile = $request->mobile;
        $setting->skype = $request->skype;
        $setting->copyright = $request->copyright;
        if($request->hasFile('icon')){
            $request->validate(['icon' => 'required|image:png']);
            $icon = $request->File('icon');
            $iconFileName = $icon->getClientOriginalName();
            $iconName = pathinfo($iconFileName , PATHINFO_FILENAME);
            $iconextension = pathinfo($iconFileName , PATHINFO_EXTENSION);
            $originalName = $iconName . '.' . $iconextension;
            $path = public_path('Images/setting/icon/');
            File::makeDirectory($path,$mode = 0777,true,true);
            Image::make($icon)->save($path . $originalName);
            $setting->icon = $originalName;
        }
        $setting->save();
        Session()->flash('alert-success','Added Successfully');
        return back();

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
