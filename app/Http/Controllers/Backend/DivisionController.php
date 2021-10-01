<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $divisions = Division::get();
        // return view('backend.division.add_division',[
        //     'divisions' => $divisions
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions = Division::get();
        return view('backend.division.add_division',[
            'divisions' => $divisions
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
            'division_name' => 'required|unique:divisions'
        ]);

        $divisions = new Division;
        $divisions->division_name = $request->division_name;
        $divisions->save();
        Session()->flash('alert-success','Division Added Successfully');
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
        $division = Division::findOrFail($id);
        return view('backend.division.edit_division',[
            'division' => $division
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
        $division = Division::findOrFail($id);
        $division->division_name = $request->division_name;
        $division->update();
        Session()->flash('alert-success','Division Update Successfully');
        return redirect()->route('divisions.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Division::findOrFail($id)->delete();
        Session()->flash('alert-danger','Division Delete Successfully');
        return back();
    }
}
