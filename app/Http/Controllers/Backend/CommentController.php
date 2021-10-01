<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function status($id){
        $comment = Comment::findOrFail($id);
        if($comment){
            if($comment->status == 0){
                $comment->status = 1;
            }else{
                $comment->status = 0;
            }
            $comment->save();
            Session()->flash('alert-success','Status Update Successfully');
            return back();
        }else{
            return abort(404);
        }

    }
    public function index()
    {
        $comments = Comment::get();
        return view('backend.comment.list_comment',[
            'comments' => $comments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'email' => 'email',
            'description' => 'required',
        ]);
        $comments = new Comment;
        $comments->name = $request->name;
        $comments->email = $request->email;
        $comments->description = $request->description;
        $comments->product_id = $request->product_id;
        $comments->save();
        Session()->flash('message','Comment Addedd Successfully');
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
